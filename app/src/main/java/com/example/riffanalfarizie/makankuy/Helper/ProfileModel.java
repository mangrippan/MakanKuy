package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Riffan Alfarizie on 04/01/2018.
 */

public class ProfileModel {
    @SerializedName("id_konsumen")
    private String id_konsumen;
    @SerializedName("nama")
    private String nama;
    @SerializedName("email")
    private String email;
    @SerializedName("no_telp")
    private String no_telp;
    @SerializedName("saldo")
    private Integer saldo;

    public ProfileModel(String id_konsumen, String nama, String email, String no_telp, Integer saldo) {
        this.id_konsumen = id_konsumen;
        this.nama = nama;
        this.email = email;
        this.no_telp = no_telp;
        this.saldo = saldo;
    }

    public String getId_konsumen() {
        return id_konsumen;
    }

    public void setId_konsumen(String id_konsumen) {
        this.id_konsumen = id_konsumen;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
    }

    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getNo_telp() {
        return no_telp;
    }

    public void setNo_telp(String no_telp) {
        this.no_telp = no_telp;
    }

    public Integer getSaldo() {
        return saldo;
    }

    public void setSaldo(Integer saldo) {
        this.saldo = saldo;
    }
}
