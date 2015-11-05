package com.example.losstname.tilangonline;

import android.app.Activity;
import android.app.DatePickerDialog;
import android.app.Dialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.graphics.Bitmap;
import android.graphics.BitmapFactory;
import android.net.Uri;
import android.os.AsyncTask;
import android.os.Bundle;
import android.os.Environment;
import android.provider.MediaStore;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBar;
import android.support.v7.app.ActionBarActivity;
import android.text.InputType;
import android.util.Base64;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.view.View.OnClickListener;
import android.view.ViewGroup;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;

import org.apache.http.HttpEntity;
import org.apache.http.HttpResponse;
import org.apache.http.NameValuePair;
import org.apache.http.client.ClientProtocolException;
import org.apache.http.client.HttpClient;
import org.apache.http.client.entity.UrlEncodedFormEntity;
import org.apache.http.client.methods.HttpPost;
import org.apache.http.impl.client.DefaultHttpClient;
import org.apache.http.message.BasicNameValuePair;
import org.apache.http.util.EntityUtils;

import java.io.BufferedReader;
import java.io.ByteArrayOutputStream;
import java.io.File;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.UnsupportedEncodingException;
import java.text.DateFormat;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.Date;
import java.util.List;
import java.util.Locale;


public class SuratTilang extends ActionBarActivity
        implements NavigationDrawerFragment.NavigationDrawerCallbacks, OnClickListener {

    /**
     * Fragment managing the behaviors, interactions and presentation of the navigation drawer.
     */
    private NavigationDrawerFragment mNavigationDrawerFragment;
    private EditText editTextTanggalLahir;
    private EditText editTextTanggalTilang;
    private String tanggalTilangNow;
    private String jamTilangNow;
    private String warnaKertas;

    String ba1;
    public static String nmerHP;
    public static String URL = "http://10.0.2.2/project-otwhackaton/imageupload.php";
    String mCurrentPhotoPath;
    ImageView mImageView;
    EditText editT1;
    int code;

    private DatePickerDialog tanggalLahirDatePickerDialog;

    private SimpleDateFormat dateFormatter;
     /**
     * Used to store the last screen title. For use in {@link #restoreActionBar()}.
     */
    private CharSequence mTitle;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_surat_tilang);




        mNavigationDrawerFragment = (NavigationDrawerFragment)
                getSupportFragmentManager().findFragmentById(R.id.navigation_drawer);
        mTitle = getTitle();

        // Set up the drawer.
        mNavigationDrawerFragment.setUp(
                R.id.navigation_drawer,
                (DrawerLayout) findViewById(R.id.drawer_layout));

    }

    @Override
    public void onNavigationDrawerItemSelected(int position) {
        // update the main content by replacing fragments
        FragmentManager fragmentManager = getSupportFragmentManager();
        fragmentManager.beginTransaction()
                .replace(R.id.container, PlaceholderFragment.newInstance(position + 1))
                .commit();
    }

    public void onSectionAttached(int number) {
        switch (number) {
            case 1:
                mTitle = getString(R.string.title_section1);
                warnaKertas = "Biru";
                break;
            case 2:
                mTitle = getString(R.string.title_section2);
                warnaKertas = "Merah";
                break;
        }
    }

    public void restoreActionBar() {
        ActionBar actionBar = getSupportActionBar();
        actionBar.setNavigationMode(ActionBar.NAVIGATION_MODE_STANDARD);
        actionBar.setDisplayShowTitleEnabled(true);
        actionBar.setTitle(mTitle);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        if (!mNavigationDrawerFragment.isDrawerOpen()) {
            // Only show items in the action bar relevant to this screen
            // if the drawer is not showing. Otherwise, let the drawer
            // decide what to show in the action bar.
            getMenuInflater().inflate(R.menu.surat_tilang, menu);
            restoreActionBar();
            return true;
        }
        return super.onCreateOptionsMenu(menu);
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @Override
    public void onClick(View v) {
        dateFormatter = new SimpleDateFormat("dd-MM-yyyy", Locale.UK);
        findViewsById();
        setDateTimeField();
        tanggalLahirDatePickerDialog.show();
        getDateTimeNow();
        editTextTanggalTilang.setText(tanggalTilangNow+"  "+jamTilangNow);
    }
    /**
     * A placeholder fragment containing a simple view.
     */
    public static class PlaceholderFragment extends Fragment {
        /**
         * The fragment argument representing the section number for this
         * fragment.
         */
        private static final String ARG_SECTION_NUMBER = "section_number";

        /**
         * Returns a new instance of this fragment for the given section
         * number.
         */
        public static PlaceholderFragment newInstance(int sectionNumber) {
            PlaceholderFragment fragment = new PlaceholderFragment();
            Bundle args = new Bundle();
            args.putInt(ARG_SECTION_NUMBER, sectionNumber);
            fragment.setArguments(args);
            return fragment;
        }

        public PlaceholderFragment() {
        }

        @Override
        public View onCreateView(LayoutInflater inflater, ViewGroup container,
                                 Bundle savedInstanceState) {
            View rootView = inflater.inflate(R.layout.fragment_surat_tilang, container, false);
            return rootView;
        }

        @Override
        public void onAttach(Activity activity) {
            super.onAttach(activity);
            ((SuratTilang) activity).onSectionAttached(
                    getArguments().getInt(ARG_SECTION_NUMBER));
        }


    }
    private void findViewsById() {
        editTextTanggalLahir = (EditText) findViewById(R.id.tanggalLahir);
        editTextTanggalLahir.setInputType(InputType.TYPE_NULL);

        editTextTanggalTilang = (EditText) findViewById(R.id.tanggalTilang);
        editTextTanggalTilang.setInputType(InputType.TYPE_NULL);
    }

    private void setDateTimeField() {
        editTextTanggalLahir.setOnClickListener(this);

        Calendar newCalendar = Calendar.getInstance();
        tanggalLahirDatePickerDialog = new DatePickerDialog(this, new DatePickerDialog.OnDateSetListener() {

            public void onDateSet(DatePicker view, int year, int monthOfYear, int dayOfMonth) {
                Calendar newDate = Calendar.getInstance();
                newDate.set(year, monthOfYear, dayOfMonth);
                editTextTanggalLahir.setText(dateFormatter.format(newDate.getTime()));
            }

        }, newCalendar.get(Calendar.YEAR), newCalendar.get(Calendar.MONTH), newCalendar.get(Calendar.DAY_OF_MONTH));

    }

    public void getDateTimeNow(){
        DateFormat dateFormat = new SimpleDateFormat("yyyy/MM/dd");
        DateFormat timeFormat = new SimpleDateFormat("HH:mm:ss");
        Calendar cal = Calendar.getInstance();
        tanggalTilangNow = dateFormat.format(cal.getTime());
        jamTilangNow = timeFormat.format(cal.getTime());
    }


    public void simpanOnClick(View view){
        final Context context = this;
        getDateTimeNow();
        EditText kesatuan= (EditText) findViewById(R.id.kesatuan);
        EditText namaTerdakwa= (EditText) findViewById(R.id.namaTerdakwa);
        EditText alamatTerdakwa= (EditText) findViewById(R.id.alamatTerdakwa);
        EditText noHp= (EditText) findViewById(R.id.noHp);
        Spinner pekerjaanTerdakwa= (Spinner) findViewById(R.id.pekerjaanTerdakwa);
        Spinner pendidikanTerdakwa= (Spinner) findViewById(R.id.pendidikanTerdakwa);
        EditText umurTerdakwa= (EditText) findViewById(R.id.umurTerdakwa);
        EditText tempatLahir= (EditText) findViewById(R.id.tempatLahir);
        EditText tanggalLahir= (EditText) findViewById(R.id.tanggalLahir);
        EditText noKTP= (EditText) findViewById(R.id.noKTP);
        EditText golonganSIM= (EditText) findViewById(R.id.golonganSIM);
        EditText noPlat= (EditText) findViewById(R.id.noPlat);
        Spinner jenisKendaraan= (Spinner) findViewById(R.id.jenisKendaraan);
        EditText lokasiTilang= (EditText) findViewById(R.id.lokasiTilang);
        EditText wilayahHukum= (EditText) findViewById(R.id.wilayahHukum);
        Spinner suratDisita= (Spinner) findViewById(R.id.suratDisita);
        Spinner sidang= (Spinner) findViewById(R.id.sidang);
        Spinner pasal= (Spinner) findViewById(R.id.pasal);
        Spinner denda= (Spinner) findViewById(R.id.denda);
        nmerHP = noHp.getText().toString();
        saveData(kesatuan.getText().toString(), namaTerdakwa.getText().toString(), alamatTerdakwa.getText().toString(),
                noHp.getText().toString(), pekerjaanTerdakwa.getSelectedItem().toString(), pendidikanTerdakwa.getSelectedItem().toString(),
                umurTerdakwa.getText().toString(), tempatLahir.getText().toString(), tanggalLahir.getText().toString(),
                noKTP.getText().toString(), golonganSIM.getText().toString(), noPlat.getText().toString(),
                jenisKendaraan.getSelectedItem().toString(),tanggalTilangNow,jamTilangNow, lokasiTilang.getText().toString(), wilayahHukum.getText().toString(),
                suratDisita.getSelectedItem().toString(), sidang.getSelectedItem().toString(), pasal.getSelectedItem().toString(),
                denda.getSelectedItem().toString(), noKTP.getText().toString()+".jpg", Login.usernm, warnaKertas);
        mImageView = (ImageView) findViewById(R.id.fotoTerdakwa);
        upload();
    }

    private void saveData(final String kesatuan, String namaTerdakwa, String alamatTerdakwa, String noHp,
                          String pekerjaanTerdakwa, String pendidikanTerdakwa, String umurTerdakwa, String tempatLahir, String tanggalLahir,
                          String noKTP, String golonganSIM, String noPlat, String jenisKendaraan, String tanggalTilang, String jamTilang,
                          String lokasiTilang, String wilayahHukum, String suratDisita, String sidang, String pasal, String denda, String foto, String userId, String wrnaKertas) {

        class SaveDataAsync extends AsyncTask<String, Void, String> {

            private Dialog loadingDialog;

            @Override
            protected void onPreExecute() {
                super.onPreExecute();
                loadingDialog = ProgressDialog.show(SuratTilang.this, "Please wait", "Loading...");
            }

            @Override
            protected String doInBackground(String... params) {
                String kesatuan1 = params[0];
                String namaTerdakwa1 = params[1];
                String alamatTerdakwa1 = params[2];
                String noHp1 = params[3];
                String pekerjaanTerdakwa1 = params[4];
                String pendidikanTerdakwa1 = params[5];
                String umurTerdakwa1 = params[6];
                String tempatLahir1 = params[7];
                String tanggalLahir1 = params[8];
                String noKTP1 = params[9];
                String golonganSIM1 = params[10];
                String noPlat1 = params[11];
                String jenisKendaraan1 = params[12];
                String tanggalTilang1 = params[13];
                String jamTilang1 = params[14];
                String lokasiTilang1 = params[15];
                String wilayahHukum1 = params[16];
                String suratDisita1 = params[17];
                String sidang1 = params[18];
                String pasal1 = params[19];
                String denda1 = params[20];
                String foto1 = params[21];
                String userId1 = params[22];
                String wrnaKertas1 = params[23];

                InputStream is = null;
                List<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
                nameValuePairs.add(new BasicNameValuePair("kesatuan", kesatuan1));
                nameValuePairs.add(new BasicNameValuePair("namaTerdakwa", namaTerdakwa1));
                nameValuePairs.add(new BasicNameValuePair("alamatTerdakwa", alamatTerdakwa1));
                nameValuePairs.add(new BasicNameValuePair("noHp", noHp1));
                nameValuePairs.add(new BasicNameValuePair("pekerjaanTerdakwa", pekerjaanTerdakwa1));
                nameValuePairs.add(new BasicNameValuePair("pendidikanTerdakwa", pendidikanTerdakwa1));
                nameValuePairs.add(new BasicNameValuePair("umurTerdakwa", umurTerdakwa1));
                nameValuePairs.add(new BasicNameValuePair("tempatLahir", tempatLahir1));
                nameValuePairs.add(new BasicNameValuePair("tanggalLahir", tanggalLahir1));
                nameValuePairs.add(new BasicNameValuePair("noKTP", noKTP1));
                nameValuePairs.add(new BasicNameValuePair("golonganSIM", golonganSIM1));
                nameValuePairs.add(new BasicNameValuePair("noPlat", noPlat1));
                nameValuePairs.add(new BasicNameValuePair("jenisKendaraan", jenisKendaraan1));
                nameValuePairs.add(new BasicNameValuePair("tanggalTilang", tanggalTilang1));
                nameValuePairs.add(new BasicNameValuePair("jamTilang", jamTilang1));
                nameValuePairs.add(new BasicNameValuePair("lokasiTilang", lokasiTilang1));
                nameValuePairs.add(new BasicNameValuePair("wilayahHukum", wilayahHukum1));
                nameValuePairs.add(new BasicNameValuePair("suratDisita", suratDisita1));
                nameValuePairs.add(new BasicNameValuePair("sidang", sidang1));
                nameValuePairs.add(new BasicNameValuePair("pasal", pasal1));
                nameValuePairs.add(new BasicNameValuePair("denda", denda1));
                nameValuePairs.add(new BasicNameValuePair("foto", foto1));
                nameValuePairs.add(new BasicNameValuePair("userId", userId1));
                nameValuePairs.add(new BasicNameValuePair("wrnaKertas", wrnaKertas1));
                String result = null;

                try{
                    HttpClient httpClient = new DefaultHttpClient();
                    HttpPost httpPost = new HttpPost("http://10.0.2.2/project-otwhackaton/simpan.php");
                    httpPost.setEntity(new UrlEncodedFormEntity(nameValuePairs));

                    HttpResponse response = httpClient.execute(httpPost);

                    HttpEntity entity = response.getEntity();

                    is = entity.getContent();

                    BufferedReader reader = new BufferedReader(new InputStreamReader(is, "UTF-8"), 8);
                    StringBuilder sb = new StringBuilder();

                    String line = null;
                    while ((line = reader.readLine()) != null)
                    {
                        sb.append(line + "\n");
                    }
                    result = sb.toString();
                } catch (ClientProtocolException e) {
                    e.printStackTrace();
                } catch (UnsupportedEncodingException e) {
                    e.printStackTrace();
                } catch (IOException e) {
                    e.printStackTrace();
                }
                return result;
            }

            @Override
            protected void onPostExecute(String result){
                String s = result.trim();
                loadingDialog.dismiss();
                if(s.equalsIgnoreCase("failure")){
                    Toast.makeText(getApplicationContext(), "Invalid User Name or Password", Toast.LENGTH_LONG).show();

                }else {
                    Intent intent = new Intent(SuratTilang.this, Home.class);
                    //intent.putExtra(USER_NAME, editTextUserName.getText());
                    startActivity(intent);
                }
            }
        }

        SaveDataAsync sda = new SaveDataAsync();
        sda.execute(kesatuan, namaTerdakwa, alamatTerdakwa, noHp, pekerjaanTerdakwa, pendidikanTerdakwa, umurTerdakwa,
                tempatLahir, tanggalLahir, noKTP, golonganSIM, noPlat, jenisKendaraan, tanggalTilang, jamTilang,
                lokasiTilang, wilayahHukum, suratDisita, sidang, pasal, denda, foto, userId, wrnaKertas);

    }

    public void imageOnClick(View view){
        mImageView = (ImageView) findViewById(R.id.fotoTerdakwa);
        captureImage();
    }

    private void upload() {
        Bitmap bm = BitmapFactory.decodeFile(mCurrentPhotoPath);
        ByteArrayOutputStream bao = new ByteArrayOutputStream();
        bm.compress(Bitmap.CompressFormat.JPEG, 50, bao);
        byte[] ba = bao.toByteArray();
        ba1 = Base64.encodeToString(ba, Base64.DEFAULT);

        // Upload image to server
        new uploadToServer().execute();

    }

    private void captureImage() {
        Intent takePictureIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        // Ensure that there's a camera activity to handle the intent
        if (takePictureIntent.resolveActivity(getPackageManager()) != null) {
            // Create the File where the photo should go
            File photoFile = null;
            try {
                photoFile = createImageFile();
            } catch (IOException ex) {
                // Error occurred while creating the File
                ex.printStackTrace();
            }
            // Continue only if the File was successfully created
            if (photoFile != null) {
                takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT,
                        Uri.fromFile(photoFile));
                startActivityForResult(takePictureIntent, 100);
            }
        }
    }

    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        if (requestCode == 100 && resultCode == RESULT_OK) {
            setPic();
        }
    }

    public class uploadToServer extends AsyncTask<Void, Void, String> {

        private ProgressDialog pd = new ProgressDialog(SuratTilang.this);

        protected void onPreExecute() {
            super.onPreExecute();
            pd.setMessage("Wait image uploading!");
            pd.show();
        }

        @Override
        protected String doInBackground(Void... params) {

            editT1 = (EditText)findViewById(R.id.noKTP);
            ArrayList<NameValuePair> nameValuePairs = new ArrayList<NameValuePair>();
            nameValuePairs.add(new BasicNameValuePair("base64", ba1));
            nameValuePairs.add(new BasicNameValuePair("ImageName", editT1.getText().toString() + ".jpg"));
            try {
                HttpClient httpclient = new DefaultHttpClient();
                HttpPost httppost = new HttpPost(URL);
                httppost.setEntity(new UrlEncodedFormEntity(nameValuePairs));
                HttpResponse response = httpclient.execute(httppost);
                String st = EntityUtils.toString(response.getEntity());
                Log.v("log_tag", "In the try Loop" + st);

            } catch (Exception e) {
                Log.v("log_tag", "Error in http connection " + e.toString());
            }
            return "Success";

        }

        protected void onPostExecute(String result) {
            super.onPostExecute(result);
            pd.hide();
            pd.dismiss();
        }
    }

    private void setPic() {
        // Get the dimensions of the View
        int targetW = mImageView.getWidth();
        int targetH = mImageView.getHeight();

        // Get the dimensions of the bitmap
        BitmapFactory.Options bmOptions = new BitmapFactory.Options();
        bmOptions.inJustDecodeBounds = true;
        BitmapFactory.decodeFile(mCurrentPhotoPath, bmOptions);
        int photoW = bmOptions.outWidth;
        int photoH = bmOptions.outHeight;

        // Determine how much to scale down the image
        int scaleFactor = Math.min(photoW / targetW, photoH / targetH);

        // Decode the image file into a Bitmap sized to fill the View
        bmOptions.inJustDecodeBounds = false;
        bmOptions.inSampleSize = scaleFactor;
        bmOptions.inPurgeable = true;

        Bitmap bitmap = BitmapFactory.decodeFile(mCurrentPhotoPath, bmOptions);
        mImageView.setImageBitmap(bitmap);
    }

    private File createImageFile() throws IOException {
        // Create an image file name
        String timeStamp = new SimpleDateFormat("yyyyMMdd_HHmmss").format(new Date());
        String imageFileName = "JPEG_" + timeStamp + "_";
        File storageDir = Environment.getExternalStoragePublicDirectory(
                Environment.DIRECTORY_PICTURES);

        File image = File.createTempFile(
                imageFileName,  /* prefix */
                ".jpg",         /* suffix */
                storageDir      /* directory */
        );

        // Save a file: path for use with ACTION_VIEW intents
        mCurrentPhotoPath = image.getAbsolutePath();
        Log.e("Getpath", "Cool" + mCurrentPhotoPath);
        return image;
    }
}

