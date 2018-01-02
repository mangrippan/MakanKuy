package com.example.riffanalfarizie.makankuy.Activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import java.io.IOException;
import java.util.HashMap;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.HttpParse;
import com.example.riffanalfarizie.makankuy.Helper.List_KategoriActivity;
import com.example.riffanalfarizie.makankuy.R;

import org.json.JSONException;
import org.json.JSONObject;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    EditText editUser, editPassword;
    Button btnMasuk;
    ProgressDialog progressDialog;
    Context context;
    ApiService apiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        context = this;
        //apiService = ApiClient.getAPIService();
        initComponents();
    }

    private void initComponents(){
        editUser = (EditText) findViewById(R.id.login_username);
        editPassword = (EditText) findViewById(R.id.login_password);
        btnMasuk = (Button) findViewById(R.id.login_masuk);

        btnMasuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                progressDialog = ProgressDialog.show(context,null,"Harap Tunggu...", true,false);
                //requestLogin();
            }
        });

    }



    public void RegisterMenu(View v){
        Intent register = new Intent(LoginActivity.this,MapsActivity.class);
        startActivity(register);
    }

    public void detail(View v){
        Intent det = new Intent(LoginActivity.this,List_KategoriActivity.class);
        startActivity(det);
    }

}
