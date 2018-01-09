package com.example.riffanalfarizie.makankuy.Activity;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.widget.EditText;
import android.widget.TextView;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.ListProfileModel;
import com.example.riffanalfarizie.makankuy.Helper.MsgModel;
import com.example.riffanalfarizie.makankuy.Helper.ProfileModel;
import com.example.riffanalfarizie.makankuy.Helper.RestoranModel;
import com.example.riffanalfarizie.makankuy.Helper.SessionManager;
import com.example.riffanalfarizie.makankuy.R;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class ProfileActivity extends AppCompatActivity {
    TextView namaTV, emailTV, nomorTV, saldoTV;
    ApiService apiService;
    String id_konsumen;
    SessionManager session;
    private List<ProfileModel> mListProfile = new ArrayList<>();
    private ProfileModel mprofileModel;
    String nama,email,nomor,saldo;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_profile);

        namaTV = (TextView)findViewById(R.id.profile_nama);
        emailTV = (TextView)findViewById(R.id.profile_email);
        nomorTV = (TextView)findViewById(R.id.profile_nomor);
        saldoTV = (TextView)findViewById(R.id.profile_saldo);

        //dapetin session
        session = new SessionManager(this);
        id_konsumen = session.getId();

        //ambil data di DB dengan parameter id_konsumen
        getProfile();

    }

    public void getProfile(){

       apiService = ApiClient.getClient().create(ApiService.class);
       Call<ProfileModel> profileModelCall = apiService.getProfile(id_konsumen);
       profileModelCall.enqueue(new Callback<ProfileModel>() {
           @Override
           public void onResponse(Call<ProfileModel> call, Response<ProfileModel> response) {
               nama  = response.body().getNama();
               email = response.body().getEmail();
               nomor = response.body().getNo_telp();
               saldo = Integer.toString(response.body().getSaldo());
               namaTV.setText(nama);
               emailTV.setText(email);
               nomorTV.setText(nomor);
               saldoTV.setText(saldo);
           }

           @Override
           public void onFailure(Call<ProfileModel> call, Throwable t) {

           }
       });
    }


}
