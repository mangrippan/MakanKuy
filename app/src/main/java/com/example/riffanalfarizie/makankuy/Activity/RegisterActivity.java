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
import com.example.riffanalfarizie.makankuy.Helper.HttpParse;
import com.example.riffanalfarizie.makankuy.R;
import java.util.HashMap;

public class RegisterActivity extends AppCompatActivity {

    Button btnRegister;
    EditText editEmail,editNama,editUsername,editPassword,editNo;
    String Email_holder, Nama_holder, Username_holder, Password_holder, No_holder;
    String finalResult;
    String URL = "http://192.168.137.1/makankuy/userregister.php";
    Boolean CheckEditText;
    ProgressDialog progressDialog;
    HashMap<String,String> hashMap = new HashMap<>();
    HttpParse httpParse = new HttpParse();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);

        editEmail = (EditText)findViewById(R.id.register_email);
        editNama = (EditText)findViewById(R.id.register_nmpengguna);
        editUsername = (EditText)findViewById(R.id.register_username);
        editPassword = (EditText)findViewById(R.id.register_password);
        btnRegister = (Button)findViewById(R.id.register_daftar);

        btnRegister.setOnClickListener(new View.OnClickListener(){
            @Override
            public void onClick(View view){
                CheckET();

                if(CheckEditText){
                    FungsiRegister(Email_holder,Nama_holder,Username_holder,Password_holder,No_holder);
                }
                else {
                    Toast.makeText(RegisterActivity.this,"Field tidak boleh kosong",Toast.LENGTH_LONG).show();
                }
            }

        });


    }
    //cek ET kosong / enggak
    public void CheckET(){
        Nama_holder= editNama.getText().toString();
        Email_holder = editEmail.getText().toString();
        Username_holder = editUsername.getText().toString();
        Password_holder = editPassword.getText().toString();
        No_holder = editNo.getText().toString();

        if (TextUtils.isEmpty(Nama_holder) || TextUtils.isEmpty(Email_holder) || TextUtils.isEmpty(Username_holder) ||
                TextUtils.isEmpty(Password_holder) || TextUtils.isEmpty(No_holder)){
            CheckEditText = false;
        }
        else {
            CheckEditText = true;
        }
    }

    public void FungsiRegister(final String Email, final String Nama, final String User, final String Pass, final String No ){

        class RegisterClass extends AsyncTask<String,Void,String>{
            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                progressDialog = progressDialog.show(RegisterActivity.this, "Loading Data", null, true, true);
            }

            @Override
            protected void onPostExecute(String httpResponseMsg){
                super.onPostExecute(httpResponseMsg);
                progressDialog.dismiss();
                Toast.makeText(RegisterActivity.this,httpResponseMsg.toString(),Toast.LENGTH_LONG).show();
            }

            @Override
            protected String doInBackground(String... params){
                hashMap.put("email",params[0]);
                hashMap.put("nama",params[1]);
                hashMap.put("username",params[2]);
                hashMap.put("password",params[3]);
                hashMap.put("no_telp",params[4]);

                finalResult = httpParse.posRequest(hashMap,URL);
                return finalResult;
            }
        }
        RegisterClass registerClass = new RegisterClass();
        registerClass.execute(Email,Nama,User,Pass,No);
    }

    public void MenuLogin(View v){
        Intent login = new Intent(RegisterActivity.this,LoginActivity.class);
        startActivity(login);
    }



}
