<?php

namespace App\Http\Controllers;
use App\Models\Orders;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
	// set index page view
	public function index() {
		return view('admin.orders.index');
	}

	// handle fetch all Inventory ajax request
	public function fetchAll() {
		$emps = Orders::all();
		$output = '';
        $counter = 1;
		if ($emps->count() > 0) {
			$output .= '
            <style>
                .switch {
                position: relative;
                display: inline-block;
                width: 90px;
                height: 34px;
                margin-top: 8px;
                }

                .switch input {display:none;}

                .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ca2222;
                -webkit-transition: .4s;
                transition: .4s;
                }

                .slider:before {
                position: absolute;
                content: "";
                height: 26px;
                width: 26px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
                }

                input:checked + .slider {
                background-color: #2ab934;
                }

                input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
                }

                input:checked + .slider:before {
                -webkit-transform: translateX(55px);
                -ms-transform: translateX(55px);
                transform: translateX(55px);
                }

                /*------ ADDED CSS ---------*/
                .on
                {
                display: none;
                }

                .on
                {
                color: white;
                position: absolute;
                transform: translate(-50%,-50%);
                top: 50%;
                left: 40%;
                font-size: 10px;
                font-family: Verdana, sans-serif;
                }

                .off
                {
                color: white;
                position: absolute;
                transform: translate(-50%,-50%);
                top: 50%;
                left: 60%;
                font-size: 10px;
                font-family: Verdana, sans-serif;
                }

                input:checked+ .slider .on
                {display: block;}

                input:checked + .slider .off
                {display: none;}

                /*--------- END --------*/

                /* Rounded sliders */
                .slider.round {
                border-radius: 34px;
                }

                .slider.round:before {
                border-radius: 50%;}
            </style>


            <table class="table table-striped table-sm text-center align-middle" id="Mytable">
            <thead>
              <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Date</th>
                <th>Customer</th>
                <th>Payment Status</th>
                <th>Ordered Amount</th>
                <th>Order Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
                foreach ($emps as $emp) {
                    $output .= '<tr>
                        <td>' .  $counter . '</td>
                        <td>'. $emp->id .'</td>
                        <td>' . $emp->created_at. '</td>
                        <td>' . $emp->user_id. ' '. $emp->user_id. '</td>
                        <td>' . $emp->payment_status. '</td>
                        <td>' . $emp->order_amount. '</td>
                        <td>' . $emp->payment_method. '</td>
                        <td>
                            <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
                                <i class="bi-pencil-square h4"></i>
                            </a>
                        </td>
                    </tr>';
                    $counter++;
                }
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}

	}

	// handle insert a new Inventory ajax request
	// public function store(Request $request) {
	// 	$file = $request->file('image');
	// 	$fileName = time() . '.' . $file->getClientOriginalExtension();
	// 	$file->storeAs('public/images', $fileName);

	// 	$empData = ['f_name' => $request->f_name,'l_name' => $request->l_name,
    //      'phone' => $request->phone, 'email' => $request->email,
    //      'password' => $request->password, 'image' => $fileName];
	// 	Orders::create($empData);
	// 	return response()->json([
	// 		'status' => 200,
	// 	]);
	// }

	// handle edit an Inventory ajax request
	public function edit(Request $request) {
		$id = $request->id;
		$emp = Orders::find($id);
		return response()->json($emp);
	}

	// handle update an Inventory ajax request
	// public function update(Request $request) {
	// 	$fileName = '';
	// 	$emp = Orders::find($request->emp_id);
	// 	if ($request->hasFile('image')) {
	// 		$file = $request->file('image');
	// 		$fileName = time() . '.' . $file->getClientOriginalExtension();
	// 		$file->storeAs('public/images', $fileName);
	// 		if ($emp->avatar) {
	// 			Storage::delete('public/images/' . $emp->image);
	// 		}
	// 	} else {
	// 		$fileName = $request->emp_avatar;
	// 	}

	// 	$empData = ['f_name' => $request->f_name,'l_name' => $request->l_name,
    //      'phone' => $request->phone, 'email' => $request->email,
    //      'password' => $request->password, 'image' => $fileName];
	// 	$emp->update($empData);
	// 	return response()->json([
	// 		'status' => 200,
	// 	]);
	// }

	// handle delete an Inventory ajax request
	// public function delete(Request $request) {
	// 	$id = $request->id;
	// 	$emp = Orders::find($id);
	// 	if (Storage::delete('public/images/' . $emp->image)) {
	// 		Orders::destroy($id);
	// 	}
	// }

    // public function status(Request $request) {
    //     $emps = Orders::find($request->id);
    //     $emps->status = $request->status;
    //     $emps->save();

	// 	// return response()->json([
	// 	// 	'status' => 200,
	// 	// ]);
    // }
}
