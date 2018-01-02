package com.example.riffanalfarizie.makankuy.Activity;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.view.WindowManager;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.example.riffanalfarizie.makankuy.Helper.ApiClient;
import com.example.riffanalfarizie.makankuy.Helper.ApiService;
import com.example.riffanalfarizie.makankuy.Helper.List_KategoriActivity;
import com.example.riffanalfarizie.makankuy.Helper.MsgModel;
import com.example.riffanalfarizie.makankuy.Helper.SessionManager;
import com.example.riffanalfarizie.makankuy.R;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {

    EditText usernameET, passwordET;
    Button loginBtn;
    ProgressDialog progressDialog;
    Context context;
    ApiService apiService;
    SessionManager session;
    public String uname;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        context = this;
        session = new SessionManager(getApplicationContext());

        usernameET = (EditText) findViewById(R.id.login_username);
        passwordET = (EditText) findViewById(R.id.login_password);
        loginBtn = (Button) findViewById(R.id.login_masuk);
        if (session.isLoggedIn()==true){
            startActivity(new Intent(LoginActivity.this,MapsActivity.class));
            finish();
        }
        Toast.makeText(getApplicationContext(), "User Login Status: " + session.isLoggedIn(), Toast.LENGTH_LONG).show();
        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                cek();
            }
        });
    }

    public void cek() {
        if (validate() == false) {
            onLoginFailed();
            return;
        }
        login();
    }

    public void onLoginFailed() {
        Toast.makeText(getBaseContext(), "Gagal Masuk", Toast.LENGTH_LONG).show();
        loginBtn.setEnabled(true);
    }

    private void login(){
        progressDialog = ProgressDialog.show(context, null, "Validasi User...",true,false);
        String user = usernameET.getText().toString();
        String password = passwordET.getText().toString();
        uname = user;
        apiService = ApiClient.getClient().create(ApiService.class);
        Call<MsgModel> userCall = apiService.loginRequest(user,password);
        userCall.enqueue(new Callback<MsgModel>() {
            @Override
            public void onResponse(Call<MsgModel> call, Response<MsgModel> response) {
                progressDialog.dismiss();
                Log.d("OnResponse", "" + response.body().getMessage());
                if (response.body().getSuccess() == 1){
                    session.loginSession(uname);
                    Intent i = new Intent(context,MapsActivity.class);
                    startActivity(i);
                    finish();
                } else {
                    Toast.makeText(context,"" + response.body().getMessage(),Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onFailure(Call<MsgModel> call, Throwable t) {
                progressDialog.dismiss();
                Log.d("OnFailure", t.toString());
            }
        });

    }

    public boolean validate(){
        boolean valid = true;

        String username = usernameET.getText().toString();
        String password = passwordET.getText().toString();


        if (username.isEmpty()) {
            usernameET.setError("Username tidak boleh kosong");
            requestFocus(usernameET);
            valid = false;
        } else {
            usernameET.setError(null);
        }

        if (password.isEmpty() ) {
            passwordET.setError("Password tidak boleh kosong");
            requestFocus(passwordET);
            valid = false;
        } else {
            passwordET.setError(null);
        }

        return valid;
    }

    private void requestFocus(View view) {
        if (view.requestFocus()) {
            getWindow().setSoftInputMode(WindowManager.LayoutParams.SOFT_INPUT_STATE_ALWAYS_VISIBLE);
        }
    }

    public void RegisterMenu(View v){
        Intent register = new Intent(LoginActivity.this,RegisterActivity.class);
        startActivity(register);
    }

    public void detail(View v){
        Intent det = new Intent(LoginActivity.this,List_KategoriActivity.class);
        startActivity(det);
    }

}
