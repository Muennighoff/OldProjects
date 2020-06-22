package f.www.myapplication2;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }

    public void toastMe (View view) {
        Toast myToast = Toast.makeText(this, "Hello Toast!", Toast.LENGTH_SHORT);
        myToast.show();
    }

    public void countMe (View view) {
        // Get The Text View
        TextView showCountTextView = (TextView) findViewById(R.id.TextView);
        // Get The Value
        String countString = showCountTextView.getText().toString();
        // convert to number & increvent
        Integer count = Integer.parseInt(countString);
        count++;
        //Show it
        showCountTextView.setText(count.toString());
    }

     public void randomMe(View view){



        // create Intent to start Second Activity
         Intent randomIntent = new Intent(this, SecondActivity.class);

         // Get the text view that shows the count.
         TextView showCountTextView = (TextView) findViewById(R.id.TextView);

         // Get the value of the text view.
         String countString = showCountTextView.getText().toString();

         // Convert the count to an int
         int count = Integer.parseInt(countString);

         // Add the count to the extras for the Intent.
         randomIntent.putExtra(TOTAL_COUNT, count);
        // start the new Activity

        startActivity(randomIntent);
    }

      private static final String TOTAL_COUNT = "total_count";
}

