package com.example.riffanalfarizie.makankuy.Helper;

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
    Call<ListRestoranModel> getAllLocation();

    @FormUrlEncoded
    @POST("lgn.php")
    Call<MsgModel> loginRequest(
            @Field("id_konsumen") String id_konsumen,
            @Field("password") String password
    );

    @FormUrlEncoded
    @POST("register.php")
    Call<MsgModel> registerRequest(
            @Field("email") String email,
            @Field("nama") String nama,
            @Field("id_konsumen") String id_konsumen,
            @Field("password") String password,
            @Field("no_telp") String no_telp
    );

}
