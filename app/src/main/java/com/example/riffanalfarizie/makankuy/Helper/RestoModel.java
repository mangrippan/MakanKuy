package com.example.riffanalfarizie.makankuy.Helper;

import android.media.Image;

import com.google.gson.annotations.SerializedName;

import java.sql.Time;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

/**
 * Created by Riffan Alfarizie on 15/12/2017.
 */

public class RestoModel {
    private List<RestoList> restoList = new ArrayList<RestoList>();
    private Map<String,Object> additionalProperties = new HashMap<String, Object>();

    public List<RestoList> getRestoList() {
        return restoList;
    }

    public void setRestoList(List<RestoList> restoList) {
        this.restoList = restoList;
    }

    public Map<String, Object> getAdditionalProperties() {
        return additionalProperties;
    }

    public void setAdditionalProperties(String name, Object value) {
        this.additionalProperties = additionalProperties;
    }
}
