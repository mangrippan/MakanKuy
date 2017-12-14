package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public class LocationModel {
    @SerializedName("nama")
    private String locationName;
    @SerializedName("longitude")
    private String longitude;
    @SerializedName("latitude")
    private String latitude;

    public LocationModel(String locationName, String longitude, String latitude){
        this.locationName = locationName;
        this.longitude = longitude;
        this.latitude = latitude;
    }

    public LocationModel(){

    }

    public String getLocationName() {
        return locationName;
    }

    public void setLocationName(String locationName) {
        this.locationName = locationName;
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
}
