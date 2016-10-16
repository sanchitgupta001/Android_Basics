package nit.qwerty.com.signup_login;

import android.content.Context;
import android.content.SharedPreferences;

/**
 * Created by Sanchit on 16-10-2016.
 */

public class Session {
    /*
     * Android provides many ways of storing data of an application.
     * One of this way is called Shared Preferences.
     * Shared Preferences allow you to save and retrieve data in the form of key,value pair.
     */

    SharedPreferences prefs;
    SharedPreferences.Editor editor;
    Context ctx;

    public Session(Context ctx)
    {
        this.ctx = ctx;
        prefs = ctx.getSharedPreferences("Signup_Login", Context.MODE_PRIVATE);
        editor = prefs.edit();
    }

    public void setLoggedIn(boolean loggedin){

        editor.putBoolean("loggedInmode",loggedin);
        editor.commit();

    }

    public boolean loggedin(){
        return prefs.getBoolean("loggedInmode",false); // Second argument is the default value in shared preferences
    }

}
