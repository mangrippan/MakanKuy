package com.example.riffanalfarizie.makankuy.Helper;

import android.media.Image;

import java.sql.Time;
import java.util.HashMap;
import java.util.Map;

/**
 * Created by Riffan Alfarizie on 15/12/2017.
 */

public class RestoList {

    private String id_restoran;
    private String nama;
    private String kategori;
    private String jalan;
    private String detail_tempat;
    private String no_telp;
    private Float rating;
    private String foto;
    private Time jam_buka;
    private Time jam_tutup;
    private Integer kapasitas;
    private Map<String,Object> additionalProperties = new HashMap<String, Object>();

    public String getId_restoran() {
        return id_restoran;
    }

    public void setId_restoran(String id_restoran) {
        this.id_restoran = id_restoran;
    }

    public String getNama() {
        return nama;
    }

    public void setNama(String nama) {
        this.nama = nama;
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

    public Time getJam_buka() {
        return jam_buka;
    }

    public void setJam_buka(Time jam_buka) {
        this.jam_buka = jam_buka;
    }

    public Time getJam_tutup() {
        return jam_tutup;
    }

    public void setJam_tutup(Time jam_tutup) {
        this.jam_tutup = jam_tutup;
    }

    public Integer getKapasitas() {
        return kapasitas;
    }

    public void setKapasitas(Integer kapasitas) {
        this.kapasitas = kapasitas;
    }

    public Map<String, Object> getAdditionalProperties(){
        return this.additionalProperties;
    }

    public void setAdditionalProperties(String name, Object value){
        this.additionalProperties.put(name,value);
    }

}
