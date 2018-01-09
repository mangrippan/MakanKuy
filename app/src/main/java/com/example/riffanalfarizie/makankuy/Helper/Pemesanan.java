package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Riffan Alfarizie on 03/01/2018.
 */

public class Pemesanan {
    @SerializedName("id_konsumen")
    private String id_konsumen;
    @SerializedName("id_restoran")
    private String id_restoran;
    @SerializedName("tanggal_pesan")
    private String tanggal_pesan;
    @SerializedName("jumlah_pesan")
    private Integer jumlah_pesan;
    @SerializedName("deposit")
    private Integer deposit;

    public Pemesanan(String id_konsumen, String id_restoran, String tanggal_pesan, Integer jumlah_pesan, Integer deposit) {
        this.id_konsumen = id_konsumen;
        this.id_restoran = id_restoran;
        this.tanggal_pesan = tanggal_pesan;
        this.jumlah_pesan = jumlah_pesan;
        this.deposit = deposit;
    }

    public String getId_konsumen() {
        return id_konsumen;
    }

    public void setId_konsumen(String id_konsumen) {
        this.id_konsumen = id_konsumen;
    }

    public String getId_restoran() {
        return id_restoran;
    }

    public void setId_restoran(String id_restoran) {
        this.id_restoran = id_restoran;
    }

    public String getTanggal_pesan() {
        return tanggal_pesan;
    }

    public void setTanggal_pesan(String tanggal_pesan) {
        this.tanggal_pesan = tanggal_pesan;
    }

    public Integer getJumlah_pesan() {
        return jumlah_pesan;
    }

    public void setJumlah_pesan(Integer jumlah_pesan) {
        this.jumlah_pesan = jumlah_pesan;
    }

    public Integer getDeposit() {
        return deposit;
    }

    public void setDeposit(Integer deposit) {
        this.deposit = deposit;
    }
}
