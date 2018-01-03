package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Riffan Alfarizie on 02/01/2018.
 */

public class User {
    @SerializedName("email")
    private String email;
    @SerializedName("nama")
    private String nama;
    @SerializedName("id_konsumen")
    private String id_konsumen;
    @SerializedName("password")
    private String password;
    @SerializedName("no_telp")
    private String no_telp;

    public User(String email, String nama, String id_konsumen, String password, String no_telp) {
        this.email = email;
        this.nama = nama;
        this.id_konsumen = id_konsumen;
        this.password = password;
        this.no_telp = no_telp;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getId_konsumen() {
        return id_konsumen;
    }

    public void setId_konsumen(String id_konsumen) {
        this.id_konsumen = id_konsumen;
    }

    public String getPassword() {
        return password;
    }

    public void setPassword(String password) {
        this.password = password;
    }

    public String getNo_telp() {
        return no_telp;
    }

    public void setNo_telp(String no_telp) {
        this.no_telp = no_telp;
    }
}
