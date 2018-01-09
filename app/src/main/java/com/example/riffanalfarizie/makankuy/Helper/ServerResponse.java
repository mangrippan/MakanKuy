package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.SerializedName;

/**
 * Created by Riffan Alfarizie on 04/01/2018.
 */

public class ServerResponse {

        // variable name should be same as in the json response from php    @SerializedName("success")
        boolean success;
        @SerializedName("message")
        String message;

        public String getMessage() {
            return message;
        }

        public boolean getSuccess() {
            return success;
        }

}
