package com.example.riffanalfarizie.makankuy.Helper;

import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import okhttp3.ResponseBody;
import retrofit2.Call;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;
import retrofit2.http.Path;
import retrofit2.http.Query;


/**
 * Created by Riffan Alfarizie on 14/12/2017.
 */

public interface ApiService {
    @GET("restoran.php")
    Call<ListRestoranModel> getAllLocation();

    @GET("profil.php")
    Call<ProfileModel> getProfile(
            @Query("id_konsumen" ) String id_konsumen
    );

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

    @FormUrlEncoded
    @POST("pemesanan.php")
    Call<MsgModel> pemesananRequest(
            @Field("id_konsumen") String id_konsumen,
            @Field("id_restoran") String id_restoran,
            @Field("tanggal_pesan") String tanggal_pesan,
            @Field("jumlah_pesan") Integer jumlah_pesan,
            @Field("deposit") Integer deposit
    );

    @FormUrlEncoded
    @POST("topup.php")
    Call<MsgModel> topupRequest(
            @Field("id_konsumen") String id_konsumen,
            @Field("tanggal_topup") String tanggal_topup,
            @Field("jumlah_topup") Integer jumlah_topup,
            @Field("bukti") String bukti
    );

    @Multipart
    @POST("bukti.php")
    Call<ServerResponse> buktiRequest(
            @Part MultipartBody.Part file,
            @Part ("file")RequestBody name
    );

    @Multipart
    @POST("/")
    Call<ResponseBody> postImage(@Part MultipartBody.Part image, @Part("name") RequestBody name);

}
