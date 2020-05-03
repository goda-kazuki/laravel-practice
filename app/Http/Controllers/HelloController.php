<?php

namespace App\Http\Controllers;

use App\Http\Requests\HelloRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Validator;

class HelloController extends Controller
{
    public function index(Request $request)
    {
        $items = DB::table("people")->get(["age", "mail", "name"]);

        return view("hello.index", ["items" => $items]);
    }

    public function post(HelloRequest $request)
    {
        $msg = $request->name;

        // cookieに保存したものをreturnしないと、保存してくれないので、
        // responseメソッドｗお仕様する。
        $response = response()->view("hello.index", ["msg" => $msg . "をくっきに"]);
        $response->cookie("msg", $msg, 10);

        return $response;
    }

    public function add(Request $request)
    {
        $params = ["age" => $request->age,
            "mail" => $request->mail,
            "name" => $request->name];

        DB::table("people")->insert($params);

        return redirect("/hello");
    }

    public function edit(Request $request)
    {
        $id = $request->id;

        $items = DB::table("people")
            ->where("id", $id)
            ->get();

        return view("hello.show", ["items" => $items, "id" => $id]);
    }

    public function update(Request $request)
    {
        $params = ["age" => $request->age,
            "mail" => $request->mail,
            "name" => $request->name];

        DB::table("people")
            ->where("id", $request->id)
            ->update($params);

        return redirect()->route("hello.edit", ["id" => $request->id, "godaa" => "はげ"]);
    }
}
