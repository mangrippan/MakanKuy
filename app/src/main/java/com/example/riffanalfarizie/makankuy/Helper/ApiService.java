package com.example.riffanalfarizie.makankuy.Helper;

import com.example.riffanalfarizie.makankuy.Helper.ListLocationModel;
import com.example.riffanalfarizie.makankuy.Helper.LocationModel;

import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.POST;



/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public interface ApiService {
    @GET("restoran.php")
    Call<ListLocationModel> getAllLocation();

}
