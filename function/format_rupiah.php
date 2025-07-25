<?php

function fNumber($number)
{
	if ($number < 0) {
		return '(' . number_format(abs($number), 2, '.', ',') . ')';
	}
	return '&nbsp;' . number_format($number, 2, '.', ',') . '&nbsp;';
}

function format_rupiah($rp)
{
	$jumlah = number_format($rp, 2, ",", ".");
	$rupiah = "Rp " . $jumlah;

	return $rupiah;
}

function format_biasa($rp)
{
	$jumlah = number_format($rp, 2, ",", ".");
	$rupiah = "" . $jumlah;

	return $rupiah;
}
function format_rupiah_akunting($rp)
{
	$jumlah = number_format($rp, 2, ",", ".");
	$rupiah = '<div class="float-left">Rp </div><div class="float-right">' . $jumlah . '</div><div class="clear-both"></div>';

	return $rupiah;
}
function format_rupiah_kwitansi($rp)
{
	$jumlah = number_format($rp, 2, ",", ".");
	$rupiah = "Rp " . $jumlah . ",-";

	return $rupiah;
}

function angkaTerbilang($x)
{
	$abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	if ($x < 12)
		return " " . $abil[$x];
	elseif ($x < 20)
		return angkaTerbilang($x - 10) . " belas";
	elseif ($x < 100)
		return angkaTerbilang($x / 10) . " puluh" . angkaTerbilang($x % 10);
	elseif ($x < 200)
		return " seratus" . angkaTerbilang($x - 100);
	elseif ($x < 1000)
		return angkaTerbilang($x / 100) . " ratus" . angkaTerbilang($x % 100);
	elseif ($x < 2000)
		return " seribu" . angkaTerbilang($x - 1000);
	elseif ($x < 1000000)
		return angkaTerbilang($x / 1000) . " ribu" . angkaTerbilang($x % 1000);
	elseif ($x < 1000000000)
		return angkaTerbilang($x / 1000000) . " juta" . angkaTerbilang($x % 1000000);
}

// Helper function to escape HTML special characters
function h($value)
{
	return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


function sanitizeInput($input)
{
	// Remove whitespace from the beginning and end of the input
	$input = trim($input);

	// Convert special characters to HTML entities
	$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');

	// Additional filtering if needed (e.g., validation or custom filtering)
	// $input = customFilterFunction($input);

	return $input;
}

// Example usage with form data (POST method)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$minPrice = isset($_POST['minPrice']) ? sanitizeInput($_POST['minPrice']) : '';
	$maxPrice = isset($_POST['maxPrice']) ? sanitizeInput($_POST['maxPrice']) : '';

	// Now, $minPrice and $maxPrice are sanitized and safe to use in your application
}


function format_urut($ctn)
{
	// Format the counter to always display two digits
	$runningNumber = sprintf("%02d", $ctn);
	// Increment the counter for the next call
	//$ctn++;
	return $runningNumber;
}
