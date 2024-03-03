<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stevebauman\Location\Facades\Location;

class UserController extends Controller
{


    public function getcount($pstats)
    {
        $res = [];
        $flag = 0;

        for ($i = 1; $i < 13; $i++) {
            $flag = 0;
            foreach ($pstats as $m) {

                if ($m->month == $i) {
                    $res[] = $m->count;
                    $flag = 1;
                    continue;

                }
            }
            if ($flag == 0) {
                $res[] = "0";
            }




        }

        return $res;




    }
    public function login()
    {
        return view("dashboard.login");
    }
    public function dashboard(Request $request)
    {

        $year = isset($request->year) ? $request->year : now()->year;
        $pstats = Patient::selectRaw("MONTH(first_visit)as month , Count(*) as count")->whereYear("first_visit", $year)->groupBy("month")->orderBy("month")->get();
        $pyear = Patient::selectRaw("YEAR(first_visit)as year , Count(*) as count")->whereYear("first_visit", $year)->groupBy("year")->orderBy("year")->get();
        $astats = Appointment::selectRaw("MONTH(app_date)as month , Count(*) as count")->whereYear("app_date", $year)->groupBy("month")->orderBy("month")->get();
        $ayear = Appointment::selectRaw("YEAR(app_date)as year , Count(*) as count")->whereYear("app_date", $year)->groupBy("year")->orderBy("year")->get();
        $h = Appointment::selectRaw("YEAR(app_date)as year, Sum(periode) as sum ")->whereYear("app_date", $year)->groupBy("year")->get();



        return view("dashboard.index", ["pstats" => UserController::getcount($pstats), "pyear" => $pyear, "astats" => UserController::getcount($astats), "ayear" => $ayear, "year" => $year, "h" => $h]);
    }

    public function auth(Request $request)
    {
        $userfields = $request->validate([
            "email" => ["email", "required"],
            "password" => ["required", "min:6"]

        ]);

        if (auth()->attempt($userfields)) {

            $request->session()->regenerate();
            Auth::user()->last_login_at = Carbon::now();
            // Auth::user()->last_login_ip_address = request()->getClientIp(); for oroduction
            Auth::user()->last_login_ip_address = "185.92.29.244";
            Auth::user()->save();
            return redirect("/dashboard");

        }
        return back()->withErrors(["email" => "Invalid information"])->onlyInput("email");




    }
    public function logout(Request $request)
    {

        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/admin/login")->with("message", "you are logged out");

    }
}