package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public class ListLocationModel {
    @SerializedName("data")
    private List<LocationModel> mData;

    public ListLocationModel(List<LocationModel> mData){
        this.mData = mData;
    }

    public ListLocationModel(){

    }

    public List<LocationModel> getmData(){
        return mData;
    }

    public void setmData(List<LocationModel> mData){
        this.mData = mData;
    }
}
