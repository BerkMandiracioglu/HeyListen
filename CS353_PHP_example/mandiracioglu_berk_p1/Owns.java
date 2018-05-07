package com.compy;

/**
 * Created by wifinaynay on 05/04/18.
 */
public class Owns {
    private String aid;
    private String cid;
    public Owns(String cid, String aid){
        this.cid = cid;
        this.aid = aid;
    }

    public String getAid() {
        return aid;
    }

    public String getCid() {
        return cid;
    }

    public void setAid(String aid) {
        this.aid = aid;
    }

    public void setCid(String cid) {
        this.cid = cid;
    }
}
