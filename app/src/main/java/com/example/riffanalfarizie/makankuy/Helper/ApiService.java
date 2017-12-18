package com.example.riffanalfarizie.makankuy.Helper;

import com.example.riffanalfarizie.makankuy.Helper.ListLocationModel;
import com.example.riffanalfarizie.makankuy.Helper.LocationModel;

import retrofit2.Call;
import retrofit2.http.GET;

/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public interface ApiService {
    @GET("JsonDisplayMarker.php")
    Call<ListLocationModel> getAllLocation();

}
