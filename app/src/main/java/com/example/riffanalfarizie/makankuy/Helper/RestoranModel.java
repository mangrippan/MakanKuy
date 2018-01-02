package com.example.riffanalfarizie.makankuy.Helper;


import android.content.Intent;
import android.media.Image;

import com.google.gson.annotations.SerializedName;

import java.sql.Time;

/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public class RestoranModel {
    @SerializedName("id_restoran")
    private String idRestoran;
    @SerializedName("nama")
    private String nama;
    @SerializedName("kategori")
    private String kategori;
    @SerializedName("jalan")
    private String jalan;
    @SerializedName("kecamatan")
    private String kecamatan;
    @SerializedName("detail_tempat")
    private String detail_tempat;
    @SerializedName("no_telp")
    private String no_telp;
    @SerializedName("rating")
    private Float rating;
    @SerializedName("foto")
    private String foto;
    @SerializedName("jam_buka")
    private String jam_buka;
    @SerializedName("jam_tutup")
    private String jam_tutup;
    @SerializedName("kapasitas")
    private Integer kapasitas;
    @SerializedName("longitude")
    private String longitude;
    @SerializedName("latitude")
    private String latitude;



    public RestoranModel(String idRestoran, String nama, String kategori, String jalan, String kecamatan, String detail_tempat, String no_telp,
                         Float rating, String foto, String jam_buka, String jam_tutup, Integer kapasitas, String longitude, String latitude){
        this.idRestoran = idRestoran;
        this.nama = nama;
        this.kategori = kategori;
        this.jalan = jalan;
        this.kecamatan = kecamatan;
        this.detail_tempat = detail_tempat;
        this.no_telp = no_telp;
        this.rating = rating;
        this.foto = foto;
        this.jam_buka = jam_buka;
        this.jam_tutup = jam_tutup;
        this.kapasitas = kapasitas;
        this.longitude = longitude;
        this.latitude = latitude;
    }


    public RestoranModel(){

    }

    public String getNama() {
        return nama;
    }

    public void setNama(String locationName) {
        this.nama = locationName;
    }

    public String getLongitude() {
        return longitude;
    }

    public void setLongitude(String longitude) {
        this.longitude = longitude;
    }

    public String getLatitude() {
        return latitude;
    }

    public void setLatitude(String latitude) {
        this.latitude = latitude;
    }

    public String getIdRestoran() {
        return idRestoran;
    }

    public void setIdRestoran(String idRestoran) {
        this.idRestoran = idRestoran;
    }

    public String getKategori() {
        return kategori;
    }

    public void setKategori(String kategori) {
        this.kategori = kategori;
    }

    public String getJalan() {
        return jalan;
    }

    public void setJalan(String jalan) {
        this.jalan = jalan;
    }

    public String getKecamatan() {
        return kecamatan;
    }

    public void setKecamatan(String kecamatan) {
        this.kecamatan = kecamatan;
    }

    public String getDetail_tempat() {
        return detail_tempat;
    }

    public void setDetail_tempat(String detail_tempat) {
        this.detail_tempat = detail_tempat;
    }

    public String getNo_telp() {
        return no_telp;
    }

    public void setNo_telp(String no_telp) {
        this.no_telp = no_telp;
    }

    public Float getRating() {
        return rating;
    }

    public void setRating(Float rating) {
        this.rating = rating;
    }

    public String getFoto() {
        return foto;
    }

    public void setFoto(String foto) {
        this.foto = foto;
    }

    public String getJam_buka() {
        return jam_buka;
    }

    public void setJam_buka(String jam_buka) {
        this.jam_buka = jam_buka;
    }

    public String getJam_tutup() {
        return jam_tutup;
    }

    public void setJam_tutup(String jam_tutup) {
        this.jam_tutup = jam_tutup;
    }

    public void setKapasitas(Integer kapasitas) {
        this.kapasitas = kapasitas;
    }

    public Integer getKapasitas() {
        return kapasitas;
    }
}
