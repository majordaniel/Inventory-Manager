<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
		public function index()
		{
			return view('settings.index');
		}

		public function edit()
		{
			return view('settings.edit');
		}

    public function update(Request $request)
		{
			$userId = $request->input('userid');

			if(auth()->user()->id != $userId) {
				return view('settings.index')->with('error', 'This error should NEVER occur, contact your administrator (Ref: User ID mismatch).');
			}

			$this->validate($request, [
				'name' => 'required|min:3|max:100',
				'email' => 'required|email|max:190|unique:users,email,'.$userId,
			]);

			if(Auth::user()->name != $request->input('name')) {
				Auth::user()->name = $request->input('name');
			}

			if(Auth::user()->email != $request->input('email')) {
				Auth::user()->email = $request->input('email');
			}

			Auth::user()->save();

			return redirect('/settings')->with('success', 'Settings have been updated!');
		}

		public function editCompanyInformation()
		{
			return view('settings.editcompany');
		}

		public function updateCompanyInformation(Request $request)
		{

			$this->validate($request, [
				'street' => 'required|min:3|max:150',
				'house_number' => 'required|min:1|max:150',
				'postal' => 'required|min:1|max:150',
				'state_province_county' => 'required|min:3|max:150',
				'country' => 'required|min:3|max:150',
				'contact_email' => 'required|min:3|max:150|email',
				'contact_phone' => 'required|min:3|max:150',
				'company_name' => 'required|min:3|max:150',
				'currency' => 'required|min:1|max:150',
			]);

			$indexes = [
				'street',
				'house_number',
				'company_name',
				'country',
				'postal',
				'state_province_county',
				'contact_email',
				'contact_phone',
				'currency'
			];

			$values = [
				$request->input('street'),
				$request->input('house_number'),
				$request->input('company_name'),
				$request->input('country'),
				$request->input('postal'),
				$request->input('state_province_county'),
				$request->input('contact_email'),
				$request->input('contact_phone'),
				$request->input('currency')
			];

			for($i = 0; $i < count($indexes); $i++) {
				DB::table('appsettings')
				->where('name', $indexes[$i])
				->update(['value' => $values[$i]]);
			}

			return redirect('/settings')->with('success', 'Company information has been updated successfully!');
		}

}
