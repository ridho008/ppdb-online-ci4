<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
	public $auth = [
		'username' => [
			'rules' => 'required'
		],
		'password' => [
			'rules' => 'required'
		],
	];

	public $auth_errors = [
		'username' => [
			'required' => '{field} wajib diisi.'
		],
		'password' => [
			'required' => '{field} wajib diisi.'
		]
	];

	public $pekerjaan = [
		'pekerjaan' => [
			'rules' => 'required'
		],
	];

	public $pekerjaan_errors = [
		'pekerjaan' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $pendidikan = [
		'pendidikan' => [
			'rules' => 'required'
		],
	];

	public $pendidikan_errors = [
		'pendidikan' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $agama = [
		'agama' => [
			'rules' => 'required'
		],
	];

	public $agama_errors = [
		'agama' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $user = [
		'username' => [
			'rules' => 'required'
		],
		'password' => [
			'rules' => 'required'
		],
		'nama' => [
			'rules' => 'required'
		],
	];

	public $user_errors = [
		'username' => [
			'required' => '{field} wajib diisi.'
		],
		'password' => [
			'required' => '{field} wajib diisi.'
		],
		'nama' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $penghasilan = [
		'penghasilan' => [
			'rules' => 'required'
		],
	];

	public $penghasilan_errors = [
		'penghasilan' => [
			'required' => '{field} wajib diisi.'
		],
	];
}
