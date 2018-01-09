package com.example.riffanalfarizie.makankuy.Activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.MsgModel;
import com.example.riffanalfarizie.makankuy.R;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class RegisterActivity extends AppCompatActivity {

    Button registerBtn;
    EditText emailET,namaET,usernameET,passwordET,nomorET;
    ProgressDialog progressDialog;
    Context context;
    ApiService apiService;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        emailET = (EditText)findViewById(R.id.register_email);
        namaET = (EditText)findViewById(R.id.register_nmpengguna);
        usernameET = (EditText)findViewById(R.id.register_username);
        passwordET = (EditText)findViewById(R.id.register_password);
        nomorET = (EditText)findViewById(R.id.register_telepon);
        registerBtn = (Button)findViewById(R.id.register_daftar);

        registerBtn.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                cek();
            }
        });
    }

    public void cek() {
        //cek apakah ada kesalahan inputan
        if (validate() == false) {
            onRegisterFailed();
            return;
        }
        //validasi register
        register();
    }

    public void onRegisterFailed() {
        Toast.makeText(getBaseContext(), "Gagal Mendafatar", Toast.LENGTH_LONG).show();
        registerBtn.setEnabled(true);
    }

    public boolean validate(){
        boolean valid = true;

        String email = emailET.getText().toString();
        String nama = namaET.getText().toString();
        String username = usernameET.getText().toString();
        String password = passwordET.getText().toString();
        String nomor = nomorET.getText().toString();

        if (email.isEmpty() || !android.util.Patterns.EMAIL_ADDRESS.matcher(email).matches()) {
            emailET.setError("masukkan email yang benar");
            valid = false;
        } else {
            emailET.setError(null);
        }

        if (nama.isEmpty()) {
            namaET.setError("Nama tidak boleh kosong");
            valid = false;
        } else {
            namaET.setError(null);
        }

        if (username.isEmpty()) {
            usernameET.setError("Username tidak boleh kosong");
            valid = false;
        } else {
            usernameET.setError(null);
        }

        if (password.isEmpty() || password.length() < 4 || password.length() > 10) {
            passwordET.setError("between 4 and 10 alphanumeric characters");
            valid = false;
        } else {
            passwordET.setError(null);
        }

        if (nomor.isEmpty()) {
            nomorET.setError("harus 12 digit");
            valid = false;
        } else {
            nomorET.setError(null);
        }
        return valid;
    }

    public void register(){
        progressDialog = ProgressDialog.show(RegisterActivity.this, null, "Membuat Akun...",true,false);

        //mengambil nilai inputan
        String email = emailET.getText().toString();
        String nama = namaET.getText().toString();
        String username =  usernameET.getText().toString();
        String password = passwordET.getText().toString();
        String nomor = nomorET.getText().toString();

        apiService = ApiClient.getClient().create(ApiService.class);
        Call<MsgModel> userCall = apiService.registerRequest(email,nama,username,password,nomor);
        userCall.enqueue(new Callback<MsgModel>() {
            @Override
            public void onResponse(Call<MsgModel> call, Response<MsgModel> response) {
                if (response.body().getSuccess()==1){
                    Intent i = new Intent(getApplicationContext(),LoginActivity.class);
                    startActivity(i);
                    Toast.makeText(context,"" + response.body().getMessage(), Toast.LENGTH_SHORT).show();
                    finish();
                } else{
                    Toast.makeText(context,"" + response.body().getMessage(), Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<MsgModel> call, Throwable t) {
                progressDialog.dismiss();
                Log.d("OnFailure", t.toString());
            }
        });
    }

    public void MenuLogin(View v){
        Intent login = new Intent(RegisterActivity.this,LoginActivity.class);
        startActivity(login);
    }

}
