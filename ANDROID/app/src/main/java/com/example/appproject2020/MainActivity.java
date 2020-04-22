package com.example.appproject2020;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    private RequestQueue queue;
    Button btn_rgst, btn_login;
    EditText email;
    EditText pass;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        email = findViewById(R.id.editText);
        pass = findViewById(R.id.editText2);

        queue = Volley.newRequestQueue(this);
        btn_login = findViewById(R.id.button);
        btn_login.setOnClickListener(new View.OnClickListener() {
            public void onClick(View v) {

            }
        });
        btn_rgst = findViewById(R.id.button3);
        btn_rgst.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                startActivity(new Intent(MainActivity.this, Register.class));
            }
        });
    }

    private void login() {
        final String[] res = new String[1];
        final String username = email.getText().toString().trim();
        final String password = pass.getText().toString().trim();

        String url = "http://127.0.0.1:8000/getUsr";

        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Request.Method.GET, url, null, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                Toast.makeText(MainActivity.this, "loading", Toast.LENGTH_LONG).show();
                res[0] = response.toString();
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(MainActivity.this, error.toString(), Toast.LENGTH_LONG).show();
            }
        });

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(jsonArrayRequest);

        String resSt = res[0];
        if (resSt.contentEquals(username) && resSt.contentEquals(password)) {
            startActivity(new Intent(MainActivity.this, main_control.class));
        }
    }
}
