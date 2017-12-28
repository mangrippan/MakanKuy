package com.example.riffanalfarizie.makankuy.Helper;

import android.app.Activity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ListAdapter;
import android.widget.ListView;
import android.widget.SimpleAdapter;
import android.widget.TextView;
import android.widget.Toast;

import com.example.riffanalfarizie.makankuy.Activity.Detail_RestoActivity;
import com.example.riffanalfarizie.makankuy.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.sql.Time;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

public class List_KategoriActivity extends Activity {


    Boolean isInternetPresent = false;

    ProgressDialog pDialog;
    String status = "1";

    JSONArray kategori = null;
    ListView listKategori;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_list_kategori);
        listKategori = (ListView) findViewById(R.id.list_kategori);

        //cekInternet();

        listKategori.setOnItemClickListener(new AdapterView.OnItemClickListener() {
            @Override
            public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                String nama = ((TextView) view.findViewById(R.id.nama_resto)).getText().toString();
                String kategori = ((TextView) view.findViewById(R.id.kategori)).getText().toString();
                String jalan = ((TextView) view.findViewById(R.id.jalan)).getText().toString();
                String detail_tempat = ((TextView) view.findViewById(R.id.detail_tempat)).getText().toString();
                String no_telp = ((TextView) view.findViewById(R.id.no_telp)).getText().toString();
                String rating = ((TextView) view.findViewById(R.id.rating)).getText().toString();
                String jam_buka = ((TextView) view.findViewById(R.id.jam_buka)).getText().toString();
                String jam_tutup = ((TextView) view.findViewById(R.id.jam_tutup)).getText().toString();
                String kapasitas = ((TextView) view.findViewById(R.id.kapasitas)).getText().toString();
                String longitude = ((TextView) view.findViewById(R.id.longitude)).getText().toString();
                String latitude = ((TextView) view.findViewById(R.id.latitude)).getText().toString();

                Intent i = new Intent(getApplicationContext(), Detail_RestoActivity.class);
                i.putExtra("nama", nama);
                i.putExtra("kategori", kategori);
                i.putExtra("jalan", jalan);
                i.putExtra("detail_tempat", detail_tempat);
                i.putExtra("no_telp", no_telp);
                i.putExtra("rating", rating);
                i.putExtra("jam_buka", jam_buka);
                i.putExtra("jam_tutup", jam_tutup);
                i.putExtra("kapasitas", kapasitas);
                i.putExtra("longitude", longitude);
                i.putExtra("latitude", latitude);

                startActivity(i);
            }
        });
    }

    public class AmbilData extends AsyncTask<String,String,String>{
        ArrayList<HashMap<String,String>> dataList = new ArrayList<HashMap<String, String>>();

        @Override
        protected void onPreExecute(){
            super.onPreExecute();
            pDialog = new ProgressDialog(List_KategoriActivity.this);
            pDialog.setMessage("Loading Data");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(true);
            pDialog.show();
        }

        @Override
        protected String doInBackground(String... arg0){
            String url;
            url = "http://192.168.137.1/makankuy/resto.php";
            JSONParser jParser = new JSONParser();
            JSONObject json = jParser.getJSONFromUrl(url);
            try{
                kategori = json.getJSONArray("restoran");
                String success = json.getString("success");

                if(success.equals("1")){
                    for (int i=0; i<kategori.length(); i++) {
                        JSONObject r = kategori.getJSONObject(i);
                        HashMap<String, String> map = new HashMap<String, String>();

                        String id_restoran = r.getString("id_restoran").trim();
                        String nama = r.getString("nama");
                        String kategori = r.getString("kategori");
                        String jalan = r.getString("jalan");
                        String detail_tempat = r.getString("detail_tempat");
                        String no_telp = r.getString("no_telp");
                        String foto = r.getString("foto");
                        String longitude = r.getString("longitude");
                        String latitude = r.getString("latitude");

                        map.put("id_restoran", id_restoran);
                        map.put("nama", nama);
                        map.put("kategori", kategori);
                        map.put("jalan", jalan);
                        map.put("detail_tempat", detail_tempat);
                        map.put("no_telp", no_telp);
                        map.put("foto", foto);
                        map.put("longitude", longitude);
                        map.put("latitude", latitude);

                        dataList.add(map);
                    }
                } else{
                    pDialog.dismiss();
                    status = "0";
                }
            } catch (JSONException e){
                pDialog.dismiss();
            }
            return null;
        }

     @Override
        protected void onPostExecute(String result){
            super.onPostExecute(result);
            pDialog.dismiss();
            if (status.equals("0")){
                Toast.makeText(getApplicationContext(), "Tidak ada data", Toast.LENGTH_SHORT).show();
            }

         ListAdapter adapter = new SimpleAdapter(getApplicationContext(),dataList, R.layout.list_kategori, new String[]{
                 "id_restoran", "nama", "kategori", "jalan", "detail_tempat", "no_telp", "foto","longitude", "latitude"},
                 new int[]{ R.id.id_restoran, R.id.nama_resto, R.id.kategori, R.id.jalan, R.id.detail_tempat,
                 R.id.no_telp, R.id.foto, R.id.longitude, R.id.latitude });

         listKategori.setAdapter(adapter);
     }

    }





}
