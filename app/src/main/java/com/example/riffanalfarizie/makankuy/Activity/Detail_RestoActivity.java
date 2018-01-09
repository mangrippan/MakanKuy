package com.example.riffanalfarizie.makankuy.Activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.AsyncTask;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.TextClock;
import android.widget.TextView;
import android.widget.Toast;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.MsgModel;
import com.example.riffanalfarizie.makankuy.Helper.SessionManager;
import com.example.riffanalfarizie.makankuy.R;
import com.google.android.gms.maps.model.LatLng;
import com.squareup.picasso.Picasso;

import org.w3c.dom.Text;

import java.io.InputStream;
import java.net.URL;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Detail_RestoActivity extends AppCompatActivity {

    private TextView namaTV;
    private TextView jalanTV;
    private TextView kecamatanTV;
    private TextView jamBukaTV;
    private TextView jamTutupTV;
    private TextView noTelpTV;
    private TextView ratingTV;
    private TextView detailTV;
    private ImageView gambarIV;
    private TextView kapasitasTV;

    private Button pesanBtn;
    private int jmlPesanan;
    private AlertDialog.Builder dialog;
    private LayoutInflater layoutInflater;
    private View dialogView;
    private EditText pesananET;
    ProgressDialog progressDialog;
    Context context;
    ApiService apiService;
    SessionManager session;
    String getUsername;
    private String idRestoran;
    SimpleDateFormat dateFormat;
    String date;
    Calendar calendar;
    private Integer deposit;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_detail_resto);

        namaTV = (TextView) findViewById(R.id.detail_nama);
        jalanTV = (TextView) findViewById(R.id.detail_alamat);
        kecamatanTV = (TextView) findViewById(R.id.detail_kecamatan);
        jamBukaTV = (TextView) findViewById(R.id.detail_buka);
        jamTutupTV = (TextView) findViewById(R.id.detail_tutup);
        noTelpTV = (TextView) findViewById(R.id.detail_telepon);
        ratingTV = (TextView) findViewById(R.id.detail_rating);
        detailTV = (TextView) findViewById(R.id.detail_tentang);
        kapasitasTV = (TextView) findViewById(R.id.detail_kapasitas);
        gambarIV = (ImageView) findViewById(R.id.detail_logo);


        session = new SessionManager(this);
        getUsername = session.getId();

        pesanBtn = (Button) findViewById(R.id.detail_pesan);
        pesanBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Dialogform();
            }
        });

        //Get dari intent
        final Intent intent = getIntent();
        Bundle bundle = intent.getBundleExtra("bund");
        idRestoran = bundle.getString("idRestoran");
        String nama = bundle.getString("nama");
        String kategori = bundle.getString("kategori");
        String jalan = bundle.getString("jalan");
        String kecamatan = bundle.getString("kecamatan");
        String detailTempat = bundle.getString("detailTempat");
        String noTelp = bundle.getString("noTelp");
        Float rating = bundle.getFloat("rating");
        String foto = bundle.getString("foto");
        String jamBuka = bundle.getString("jamBuka");
        String jamTutup = bundle.getString("jamTutup");
        Integer kapasitas = bundle.getInt("kapasitas");
        String longitude = bundle.getString("longitude");
        String latitude = bundle.getString("latitude");
        Double currentLongitude = bundle.getDouble("currentLongitude");
        Double currentLatitude = bundle.getDouble("currentLatitude");

        String curLatitude = currentLatitude.toString();
        String curLongitude = currentLongitude.toString();
        currentLatitude = Double.parseDouble(curLatitude);
        currentLongitude = Double.parseDouble(curLongitude);

        String origin = "origin="+currentLatitude+","+currentLongitude;
        String destination = "destination="+latitude+","+longitude;
        final String params = origin+"&"+destination;

        namaTV.setText(nama);
        jalanTV.setText(jalan);
        kecamatanTV.setText(kecamatan);
        jamBukaTV.setText(jamBuka);
        jamTutupTV.setText(jamTutup);
        noTelpTV.setText(noTelp);
        ratingTV.setText(String.valueOf(rating));
        detailTV.setText(detailTempat);
        kapasitasTV.setText(String.valueOf(kapasitas));
        //Toast.makeText(this, kecamatan, Toast.LENGTH_SHORT).show();

        Button getDirection = findViewById(R.id.detail_getDirection);
        getDirection.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent intent = new Intent(android.content.Intent.ACTION_VIEW,
                    Uri.parse("https://www.google.com/maps/dir/?api=1&"+params));
                startActivity(intent);
            }
        });

        Picasso.with(this).load(foto).into(gambarIV);
    }

    //input pemesanan
    public void Dialogform(){
        //Builder Design Pattern
        dialog = new AlertDialog.Builder(Detail_RestoActivity.this);
        //Adapter Design Pattern
        layoutInflater = getLayoutInflater();
        dialogView = layoutInflater.inflate(R.layout.form_pemesanan,null);
        dialog.setView(dialogView);
        dialog.setCancelable(true);
        dialog.setTitle("Pemesanan");

        pesananET = (EditText) dialogView.findViewById(R.id.form_jumlah);
        pesananET.setText(null);

        dialog.setPositiveButton("Pesan", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int i){
                String temp = pesananET.getText().toString();
                jmlPesanan = Integer.parseInt(temp);

                pesan();
                dialog.dismiss();
            }
        });
        dialog.setNegativeButton("Batal", new DialogInterface.OnClickListener() {
            @Override
            public void onClick(DialogInterface dialog, int which) {
                dialog.dismiss();
            }
        });
        dialog.show();
    }

    public void pesan(){
        //get kalender
        calendar = Calendar.getInstance();
        dateFormat = new SimpleDateFormat("dd-MM-yyyy HH:mm:ss");
        date = dateFormat.format(calendar.getTime());

        apiService = ApiClient.getClient().create(ApiService.class);
        Call<MsgModel> pesanCall = apiService.pemesananRequest(getUsername,idRestoran,date,jmlPesanan,deposit);
        pesanCall.enqueue(new Callback<MsgModel>() {
            @Override
            public void onResponse(Call<MsgModel> call, Response<MsgModel> response) {
                if (response.body().getSuccess()==1){
                    Toast.makeText(Detail_RestoActivity.this,"" + response.body().getMessage(), Toast.LENGTH_SHORT).show();
                } else {
                    Toast.makeText(Detail_RestoActivity.this,"" + response.body().getMessage(), Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<MsgModel> call, Throwable t) {

            }
        });
    }

}
