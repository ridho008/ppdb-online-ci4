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

	public $tahun = [
		'tahun' => [
			'rules' => 'required'
		],
		'ta' => [
			'rules' => 'required'
		],
	];

	public $tahun_errors = [
		'tahun' => [
			'required' => '{field} wajib diisi.'
		],
		'ta' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $jurusan = [
		'jurusan' => [
			'rules' => 'required'
		],
	];

	public $jurusan_errors = [
		'jurusan' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $banner = [
		'ket' => [
			'rules' => 'required'
		],
		'banner' => [
			'rules' => 'uploaded[banner]|max_size[banner,2024]|mime_in[banner,image/png,image/jpg,image/jpeg]'
		],
	];

	public $banner_errors = [
		'ket' => [
			'required' => '{field} wajib diisi.'
		],
		'banner' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $jalur = [
		'jalur_masuk' => [
			'rules' => 'required'
		],
		'kouta' => [
			'rules' => 'required'
		],
	];

	public $jalur_errors = [
		'jalur_masuk' => [
			'required' => '{field} wajib diisi.'
		],
		'kouta' => [
			'required' => '{field} wajib diisi.'
		],
	];

	public $lampiran = [
		'lampiran' => [
			'rules' => 'required'
		],
	];

	public $lampiran_errors = [
		'lampiran' => [
			'required' => '{field} wajib diisi.'
		],
	];

	// Halaman Dashboad Siswa
	public $identitas = [
		'nik' => [
			'rules' => 'required'
		],
		'nama' => [
			'rules' => 'required'
		],
		'tmp_lahir' => [
			'rules' => 'required'
		],
		'berat' => [
			'rules' => 'required'
		],
		'agama' => [
			'rules' => 'required'
		],
		'jml_saudara' => [
			'rules' => 'required'
		],
		'anak_ke' => [
			'rules' => 'required'
		],
		'tinggi' => [
			'rules' => 'required'
		],
		'tgl_lahir' => [
			'rules' => 'required'
		],
		'jk' => [
			'rules' => 'required'
		],
		'no_telp' => [
			'rules' => 'required'
		],
	];

	public $identitas_errors = [
		'nik' => [
			'required' => '{field} wajib diisi.'
		],
		'nama' => [
			'required' => '{field} wajib diisi.'
		],
		'tmp_lahir' => [
			'required' => '{field} wajib diisi.'
		],
		'berat' => [
			'required' => '{field} wajib diisi.'
		],
		'agama' => [
			'required' => '{field} wajib diisi.'
		],
		'jml_saudara' => [
			'required' => '{field} wajib diisi.'
		],
		'anak_ke' => [
			'required' => '{field} wajib diisi.'
		],
		'tinggi' => [
			'required' => '{field} wajib diisi.'
		],
		'tgl_lahir' => [
			'required' => '{field} wajib diisi.'
		],
		'jk' => [
			'required' => '{field} wajib diisi.'
		],
		'no_telp' => [
			'required' => '{field} wajib diisi.'
		],
	];
}
