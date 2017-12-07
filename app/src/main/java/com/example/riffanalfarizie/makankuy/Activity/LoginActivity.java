package com.example.riffanalfarizie.makankuy.Activity;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;
import java.util.HashMap;
import com.example.riffanalfarizie.makankuy.Helper.HttpParse;
import com.example.riffanalfarizie.makankuy.R;

public class LoginActivity extends AppCompatActivity {

    EditText editUser, editPassword;
    Button btnMasuk, btnDaftar;
    String passHolder, userHolder;
    String finalResult;
    Boolean CheckEditText;
    ProgressDialog progressDialog;
    HashMap<String,String> hashMap = new HashMap<>();
    HttpParse httpParse = new HttpParse();
    public static final String Username = "";
    String URL = "http://192.168.0.104/makankuy/userlogin.php";

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        editUser = (EditText) findViewById(R.id.login_username);
        editPassword = (EditText) findViewById(R.id.login_password);
        btnMasuk = (Button) findViewById(R.id.login_masuk);

        btnMasuk.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                CheckET();
                if (CheckEditText){
                    FungsiLogin(userHolder,passHolder);
                }
                else{
                    Toast.makeText(LoginActivity.this, "Field tidak boleh kosong", Toast.LENGTH_LONG).show();
                }
            }
        });
    }
    //cek ET kosong / enggak
    public void CheckET(){
        userHolder = editUser.getText().toString();
        passHolder = editPassword.getText().toString();

        if (TextUtils.isEmpty(userHolder) || TextUtils.isEmpty(passHolder)){
            CheckEditText = false;
        }
        else {
            CheckEditText = true;
        }
    }

    public void FungsiLogin(final String user, final String pass ) {
        class LoginClass extends AsyncTask<String, Void, String> {
            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressDialog = progressDialog.show(LoginActivity.this, "Loading Data", null, true, true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg) {
                super.onPostExecute(httpResponseMsg);
                progressDialog.dismiss();
                if (httpResponseMsg.equalsIgnoreCase("Data Matched")) {
                    finish();
                    Intent intent = new Intent(LoginActivity.this, MainActivity.class);
                    intent.putExtra(Username, user);
                    startActivity(intent);
                } else {
                    Toast.makeText(LoginActivity.this, httpResponseMsg, Toast.LENGTH_LONG).show();
                }
            }
            @Override
            protected String doInBackground (String... params){
                hashMap.put("user", params[0]);
                hashMap.put("pass", params[1]);
                finalResult = httpParse.posRequest(hashMap, URL);
                return finalResult;
            }
        }
    }

    public void RegisterMenu(View v){
        Intent register = new Intent(LoginActivity.this,RegisterActivity.class);
        startActivity(register);
    }




}
