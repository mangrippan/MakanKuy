package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

import java.util.List;

import retrofit2.Response;

/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public class ListRestoranModel {
    @SerializedName("data")
    private List<RestoranModel> mData;

    public ListRestoranModel(List<RestoranModel> mData, Response<ListRestoranModel> response) {
        this.mData = mData;
    }

    public ListRestoranModel() {
    }

    public List<RestoranModel> getmData() {
        return mData;
    }

    public void setmData(List<RestoranModel> mData) {
        this.mData = mData;
    }
}
