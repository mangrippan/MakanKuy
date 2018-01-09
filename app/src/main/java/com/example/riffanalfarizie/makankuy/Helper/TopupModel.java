package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Riffan Alfarizie on 04/01/2018.
 */

public class TopupModel {
    @SerializedName("id_konsumen")
    private String id_konsumen;
    @SerializedName("tanggal_topup")
    private String tanggal_topup;
    @SerializedName("jumlah_topup")
    private String jumlah_topup;
    @SerializedName("bukti")
    private Integer bukti;

    public TopupModel(String id_konsumen, String tanggal_topup, String jumlah_topup, Integer bukti) {
        this.id_konsumen = id_konsumen;
        this.tanggal_topup = tanggal_topup;
        this.jumlah_topup = jumlah_topup;
        this.bukti = bukti;
    }

    public String getId_konsumen() {
        return id_konsumen;
    }

    public void setId_konsumen(String id_konsumen) {
        this.id_konsumen = id_konsumen;
    }

    public String getTanggal_topup() {
        return tanggal_topup;
    }

    public void setTanggal_topup(String tanggal_topup) {
        this.tanggal_topup = tanggal_topup;
    }

    public String getJumlah_topup() {
        return jumlah_topup;
    }

    public void setJumlah_topup(String jumlah_topup) {
        this.jumlah_topup = jumlah_topup;
    }

    public Integer getBukti() {
        return bukti;
    }

    public void setBukti(Integer bukti) {
        this.bukti = bukti;
    }
}
