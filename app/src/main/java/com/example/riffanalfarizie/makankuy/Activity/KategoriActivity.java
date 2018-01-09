package com.example.riffanalfarizie.makankuy.Activity;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.ListKategoriAdapter;
import com.example.riffanalfarizie.makankuy.Helper.ListRestoranModel;
import com.example.riffanalfarizie.makankuy.Helper.RestoranModel;
import com.example.riffanalfarizie.makankuy.R;

import java.util.ArrayList;
import java.util.List;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class KategoriActivity extends AppCompatActivity {

    private RecyclerView recyclerView;
    private ArrayList<RestoranModel> listResto;
    private ListKategoriAdapter adapter;

    @Override
    protected void onCreate(Bundle saveInstanceState){
        super.onCreate(saveInstanceState);
        setContentView(R.layout.activity_kategori);
        initViews();
    }

    private void initViews(){
        recyclerView = (RecyclerView)findViewById(R.id.card_kategori);
        recyclerView.setHasFixedSize(true);
        RecyclerView.LayoutManager layoutManager = new LinearLayoutManager(getApplicationContext());
        recyclerView.setLayoutManager(layoutManager);
        //loadData();
    }

    private void loadData(){
        ApiService apiService = ApiClient.getClient().create(ApiService.class);
        Call<ListRestoranModel> call = apiService.getAllLocation();
        call.enqueue(new Callback<ListRestoranModel>() {
            @Override
            public void onResponse(Call<ListRestoranModel> call, Response<ListRestoranModel> response) {
                listResto = (ArrayList<RestoranModel>) response.body().getmData();
                adapter = new ListKategoriAdapter(listResto);
                recyclerView.setAdapter(adapter);
            }

            @Override
            public void onFailure(Call<ListRestoranModel> call, Throwable t) {

            }
        });
    }




}
