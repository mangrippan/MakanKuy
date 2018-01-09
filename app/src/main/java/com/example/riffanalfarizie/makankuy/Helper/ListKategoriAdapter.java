package com.example.riffanalfarizie.makankuy.Helper;

import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import com.example.riffanalfarizie.makankuy.R;

import java.util.ArrayList;
import java.util.List;

/**
 * Created by Riffan Alfarizie on 03/01/2018.
 */

public class ListKategoriAdapter extends RecyclerView.Adapter<ListKategoriAdapter.ViewHolder> {
    private List<RestoranModel> listKategori = new ArrayList<>();

    public ListKategoriAdapter(ArrayList<RestoranModel> kategori){
        this.listKategori = kategori;
    }

    @Override
    public ListKategoriAdapter.ViewHolder onCreateViewHolder(ViewGroup viewGroup,int i){
        View view = LayoutInflater.from(viewGroup.getContext()).inflate(R.layout.list_kategori,viewGroup,false);
        return new ViewHolder(view);
    }

    @Override
    public void onBindViewHolder(ListKategoriAdapter.ViewHolder viewHolder, int i){
        viewHolder.kategoriTV.setText(listKategori.get(i).getKategori());
    }

    @Override
    public int getItemCount(){
        return listKategori.size();
    }

    public class ViewHolder extends RecyclerView.ViewHolder{
        private TextView kategoriTV;
        public ViewHolder(View view) {
            super(view);

            kategoriTV = (TextView)view.findViewById(R.id.card_kategori);


        }
    }
}


