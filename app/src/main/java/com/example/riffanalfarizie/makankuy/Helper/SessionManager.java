package com.example.riffanalfarizie.makankuy.Helper;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

import com.example.riffanalfarizie.makankuy.Activity.LoginActivity;
import com.example.riffanalfarizie.makankuy.Activity.MapsActivity;

import java.util.HashMap;

/**
 * Created by Riffan Alfarizie on 02/01/2018.
 */

public class SessionManager {
    SharedPreferences sharedPreferences;
    SharedPreferences.Editor editor;
    Context context;
    int PRIVATE_MODE = 0;

    private static final String PREF_NAME = "MakanKuyPref";
    public static final String IS_LOGIN = "IsLoggedIn";
    //public static final String KEY_NAME = "nama";
    public static final String KEY_UNAME = "id_konsumen";

    public SessionManager(Context context){
        this.context = context;
        sharedPreferences = context.getSharedPreferences(KEY_UNAME,PRIVATE_MODE);
        editor = sharedPreferences.edit();
    }

    public void loginSession(String id_konsumen){
        editor.putBoolean(IS_LOGIN,true);
        //editor.putString(KEY_NAME, nama);
        editor.putString(KEY_UNAME, id_konsumen);
        editor.commit();
    }

    public void cekLogin(){
        if (!this.isLoggedIn()){
            Intent i = new Intent(context, LoginActivity.class);
            i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
            i.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
            context.startActivity(i);
        }
    }

    /*public void passLogin(){
        if (this.isLoggedIn()==true){
            Intent i = new Intent(context,MapsActivity.class);
            context.startActivity(i);
        }
    }*/

    public HashMap<String,String> getUser(){
        HashMap<String,String> user = new HashMap<String, String>();
        //user.put(KEY_NAME, sharedPreferences.getString(KEY_NAME,null));
        user.put(KEY_UNAME, sharedPreferences.getString(KEY_UNAME,null));
        return user;
    }

    public String getId(){
        return sharedPreferences.getString(KEY_UNAME,"");
    }

    public void logoutUser(){
        editor.clear();
        editor.commit();
        Intent i = new Intent(context, LoginActivity.class);
        context.startActivity(i);
    }

    public void saveSPBoolean(String keySP, boolean value){
        editor.putBoolean(keySP, value);
        editor.commit();
    }

    public boolean isLoggedIn(){
        return sharedPreferences.getBoolean(IS_LOGIN, false);
    }

}
