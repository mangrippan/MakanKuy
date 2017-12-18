package com.example.riffanalfarizie.makankuy.Activity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.support.v4.app.FragmentActivity;
import android.os.Bundle;
import android.widget.Toast;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.ListLocationModel;
import com.example.riffanalfarizie.makankuy.Helper.LocationModel;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.LatLng;
import com.google.android.gms.maps.model.Marker;
import com.google.android.gms.maps.model.MarkerOptions;
import com.example.riffanalfarizie.makankuy.R;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MapsActivity extends FragmentActivity implements OnMapReadyCallback {

    private GoogleMap mMap;
    private List<LocationModel> mListMarker = new ArrayList<>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_maps);
        // Obtain the SupportMapFragment and get notified when the map is ready to be used.
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.map);
        mapFragment.getMapAsync(this);
    }


    /**
     * Manipulates the map once available.
     * This callback is triggered when the map is ready to be used.
     * This is where we can add markers or lines, add listeners or move the camera. In this case,
     * we just add a marker near Sydney, Australia.
     * If Google Play services is not installed on the device, the user will be prompted to install
     * it inside the SupportMapFragment. This method will only be triggered once the user has
     * installed Google Play services and returned to the app.
     */
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        getData();
    }

    private  void getData(){
        final ProgressDialog dialog = new ProgressDialog(this);
        dialog.setMessage("Menampilkan data...");
        dialog.show();

        ApiService apiService = ApiClient.getClient().create(ApiService.class);
        Call<ListLocationModel> call = apiService.getAllLocation();
        call.enqueue(new Callback<ListLocationModel>() {
            @Override
            public void onResponse(Call<ListLocationModel> call, Response<ListLocationModel> response) {
                dialog.dismiss();
                mListMarker = response.body().getmData();
                initMarker(mListMarker);
            }

            @Override
            public void onFailure(Call<ListLocationModel> call, Throwable t) {
                dialog.dismiss();
                Toast.makeText(MapsActivity.this, t.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }

    private void initMarker(List<LocationModel> listData){
        for (int i=0; i<mListMarker.size(); i++){
            //set latlng
            LatLng location = new LatLng(Double.parseDouble(mListMarker.get(i).getLatitude()),Double.parseDouble(mListMarker.get(i).getLongitude()));
            //nambah marker
            mMap.addMarker(new MarkerOptions().position(location).title(mListMarker.get(i).getLocationName()));
            //set latlng index ke 0
            LatLng latLng = new LatLng(Double.parseDouble(mListMarker.get(0).getLatitude()),Double.parseDouble(mListMarker.get(0).getLongitude()));
            //arahkan zooming ke index 0
            mMap.animateCamera(CameraUpdateFactory.newLatLngZoom(new LatLng(latLng.latitude,latLng.longitude), 11.0f));
        }
    }
}
