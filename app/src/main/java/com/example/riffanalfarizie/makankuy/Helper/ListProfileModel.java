package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

import java.util.List;

/**
 * Created by Riffan Alfarizie on 04/01/2018.
 */

public class ListProfileModel {
    @SerializedName("row")
    private List<ProfileModel> mData;

    public ListProfileModel(List<ProfileModel> mData) {
        this.mData = mData;
    }

    public List<ProfileModel> getmData() {
        return mData;
    }

    public void setmData(List<ProfileModel> mData) {
        this.mData = mData;
    }
}
