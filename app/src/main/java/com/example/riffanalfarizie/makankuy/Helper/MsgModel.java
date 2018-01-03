package com.example.riffanalfarizie.makankuy.Helper;

import com.google.gson.annotations.Expose;

/**
 * Created by Riffan Alfarizie on 02/01/2018.
 */

public class MsgModel {
    private Integer success;
    private String message;

    /**
     * No args constructor for use in serialization
     */
    public MsgModel() {
    }

    /**
     * @param message
     * @param success
     */
    public MsgModel(Integer success, String message) {
        super();
        this.success = success;
        this.message = message;
    }

    public Integer getSuccess() {
        return success;
    }

    public void setSuccess(Integer success) {
        this.success = success;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }



}
