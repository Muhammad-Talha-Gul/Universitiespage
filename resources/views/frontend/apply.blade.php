@extends('layouts.frontend')
@section('title', 'Application Form | '.$data->name.' | '.$data->university->name)

@section('customStyles')
<style type="text/css">
	nav>.nav.nav-tabs {

		border: 2px solid #ebebeb;
		color: #fff;
		background: #ebebeb;
		border-radius: 0;

	}

	nav>div a.nav-item.nav-link,
	nav>div a.nav-item.nav-link.active {
		border: none;
		padding: 18px 25px;
		border-radius: 0;
	}

	nav>div a.nav-item.nav-link.active:after {
		content: "";
		position: absolute;
		bottom: -30px;
		left: 46% !important;
		border: 15px solid transparent;
		border-top-color: #c52228;
	}

	.tab-content {
		background: #fdfdfd;
		line-height: 25px;
		border: 1px solid #ddd;
		border-top: 2px solid #bdbdbd;
		border-bottom: 5px solid #838484;
	}

	nav>div a.nav-item.nav-link:hover,
	nav>div a.nav-item.nav-link:focus {
		border: none;
		background: #c52228;
		color: #fff !important;
		border-radius: 0;
		transition: background 0.20s linear;
	}

	.apply_detail div#nav-tab {
		padding: 8px;
	}

	.apply_detail a {
		padding: 16px 0px !important;
		position: relative;
		font-size: 14px;
		font-weight: bold;
		color: #000 !important;
		width: calc(100% / 4.6);
	}

	.apply_detail nav>div a.nav-item.nav-link:after {

		left: -7%;

	}

	.f_grid {
		margin-left: 0px !important;
		margin-right: 0px !important;
	}

	.grid--space.f_grid {
		margin-top: 20px;
	}

	.alert-warning {
		color: #8a6d3b;
		background-color: #F4E4B3;
		border-color: #faebcc;
	}

	.alert {
		padding: 15px;
		margin-bottom: 20px;

		border-radius: 4px;

	}

	.bordered:hover {

		/*border: 2px solid #30b0c9;*/
	}

	.payment .bordered:hover {

		border: 2px solid #30b0c9;
	}

	.payment_border {
		margin: 0px;
		width: 200px;
		margin-bottom: 15px;
		/*height: 95px;*/
		display: inline-block;
	}

	.f_content {}

	.f_alert {
		background-color: #F4E4B3 !important;
		border-color: #faebcc;
		border: 1px solid #F4E4B3 !important;
		line-height: 0.5;
		margin-top: 26px !important;
		margin-bottom: 20px !important;
		padding: 19px !important;
		text-align: left;
		font-size: 13px
	}


	.w3-light-grey,
	.w3-hover-light-grey:hover,
	.w3-light-gray,
	.w3-hover-light-gray:hover {
		color: #000 !important;
		/*background-color: #f1f1f1!important;*/
	}

	.w3-sidebar {
		height: 100%;
		*/ background-color: #fff;
		position: absolute;
		z-index: 1;
		/*overflow: auto;*/
		/* border: 1px solid #d8d8d8; */
	}

	.w3-bar-block .w3-bar-item {
		width: 100%;
		display: block;
		padding: 8px 16px;
		text-align: left;
		border: none;
		white-space: normal;
		float: none;
		outline: 0;
		line-height: 0.1;
	}

	.w3-teal,
	.w3-hover-teal:hover {
		color: #fff !important;

	}

	.w3-container,
	.w3-panel {}

	a.w3-bar-item.w3-button {
		border-bottom: 1px solid;
	}

	/* This css is for normalizing styles. You can skip this. */
	*,
	*:before,
	*:after {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}




	.new {
		padding: 50px;
	}

	.form-group {
		display: block;
		margin-bottom: 15px;
	}

	.form-group input {
		padding: 0;
		height: initial;
		width: initial;
		margin-bottom: 0;
		display: none;
		cursor: pointer;
	}

	.form-group label {
		position: relative;
		cursor: pointer;
	}

	.form-group label:before {
		content: '';
		-webkit-appearance: none;
		background-color: transparent;
		border: 2px solid #0079bf;
		box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05), inset 0px -15px 10px -12px rgba(0, 0, 0, 0.05);
		padding: 10px;
		display: inline-block;
		position: relative;
		vertical-align: middle;
		cursor: pointer;
		margin-right: 5px;
		display: none;
	}

	.form-group input:checked+label:after {
		content: '';
		display: block;
		position: absolute;
		top: 2px;
		left: 9px;
		width: 6px;
		height: 14px;
		border: solid #0079bf;
		border-width: 0 2px 2px 0;
		transform: rotate(45deg);
	}

	.check_main {
		cursor: pointer;
		box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
	}

	.check_main i {
		position: absolute;
		right: 10px;
		top: 11px;
		font-size: 39px;
		color: #0B6D76;
		display: none;
	}

	.check_main:hover {
		background: #0B6D76 !important;
	}

	.check_main:hover span {
		color: #fff;
	}

	.check_main span {
		display: inline-block;
		width: 100%;
		text-align: left;
		position: relative;
		color: #464646;
		font-size: 12px;
		left: 20px;
	}

	.form-group.check_main {
		margin-bottom: 7px !important;
		padding: 15px 0px;
		transition: all ease-in-out 0.3s;
		font-weight: bold;
		position: relative;
		width: 98%;
		margin-left: 1%;
		border: none;
	}

	.w3-teal p {

		line-height: 33px;
		padding: 0 30px;
		margin: 0 0 0px;
		font-size: 14px;
		cursor: pointer;
		background: url(../images/apply/icon1.png) no-repeat 660px -722px #E3E3E3;
		border-bottom: 2px solid #d8d8d8;
		color: #000;
	}

	span.left_float {

		color: #999;
	}

	.w3-teal h2 {
		text-align: left;
		font-size: 22px;
		color: #464646;
	}

	.w3-container.main_side {
		background-color: #fff;
		padding-left: 12px;
		padding-top: 1px;
	}

	#login .form-group {
		margin-bottom: 25px;
	}

	.sr-only {
		position: absolute;
		width: 1px;
		height: 1px;
		padding: 0;
		margin: -1px;
		overflow: hidden;
		clip: rect(0, 0, 0, 0);
		border: 0;
	}

	.form-control {
		display: block;
		width: 100%;
		height: 34px;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
		-webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
		-webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
		-o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
		transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
	}

	.main_tabs {
		/*margin-left: 24%;*/
		width: 100%
	}

	.main_side .form-group {
		display: block !important;
	}

	.form-group input {


		display: block;

	}

	.main_side .form-group input {
		padding: 10px;
		height: 40px;
		width: 100%;
		margin-bottom: 0;
		display: block;
		cursor: pointer;
		border-radius: 5px;
		outline: none !important;
		border-color: lightgray !important;
	}

	.main_side select {
		width: 100%;
		height: 40px;
		border-radius: 5px;
		padding: 5px;
		border: 1px solid #ccc;
		background-color: #fff;
		color: #a39e9e;
		font-size: 14px;
		cursor: pointer;
		outline: none !important;
		border-color: lightgray !important;
	}

	input[type="checkbox"]:not(old),
	input[type="radio"]:not(old) {

		opacity: initial !important;
	}

	.w3-teal,
	.w3-hover-teal:hover {
		color: #000 !important;
	}

	.checkbox-inline,
	.radio-inline {
		position: relative;
		display: inline-block;
		padding-left: 20px;
		margin-bottom: 0;
		font-weight: 400;
		vertical-align: middle;
		cursor: pointer;
		float: left;
		display: -webkit-inline-box;

		margin-right: 16px !important;

		width: 9% !important;
	}

	p.radio_text {
		line-height: 16px;
		background-color: transparent;
		border-bottom: none;
		text-align: left;
		padding: 0px;
		/* margin-top: 10px; */
		font-size: 12px;
		color: #858585 !important;
		font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
		padding-left: 10px;
		padding-right: 10px;
	}

	#one p {
		font-size: 14px;
		color: #000 !important;
		font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
	}

	.form-group label {
		padding: 0px;
		margin-bottom: 3px;
	}

	.radio_button span {
		margin-left: 10px;
		font-size: 13px;
		line-height: 36px;
	}

	.check_main.form-group input {

		display: none !important;
	}

	.radio-inline input {
		width: 24% !important;
	}

	.text_area {
		float: left;
		border: 1px solid #ccc;
		background-color: #fff;
		box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);

	}

	.span_text {
		border: 1px;
	}

	textarea.span_text {
		padding-left: 10px;
		padding-right: 10px;
		padding-top: 10px;
		padding-bottom: 10px;
	}

	.f_declaration input {
		display: none !important;
	}

	.f_declaration {
		text-align: left;
		margin-top: 15px;
		padding-left: 20px;
		padding-right: 20px;
		font-size: 14px;
	}

	.f_declaration label {
		margin-top: 10px;
	}

	.f_declaration input[type="checkbox"]:not(old)+label,
	input[type="radio"]:not(old)+label {
		display: initial;
		margin-left: -28px;
		padding-left: 28px;
		/*background: url(../img/checks.png) no-repeat 0 0;*/
		background-position-x: 0px;
		background-position-y: 0px;
		line-height: 24px;
		padding-bottom: 10px;
	}

	.form-group input:checked+label:after {
		content: '';
		display: block;
		position: absolute;
		top: 6px;
		left: 9px;
		width: 5px;
		height: 9px;
		border: solid #0079bf;
		border-width: 0 2px 2px 0;
		transform: rotate(45deg);
	}

	.checkbox_form {
		float: left;
	}

	input.custom-file:before {
		content: 'Select some files';
		display: inline-block;
		background: linear-gradient(top, #f9f9f9, #e3e3e3);
		border: 2px solid #464646;
		border-radius: 3px;
		padding: 5px 8px;
		outline: none;
		white-space: nowrap;
		-webkit-user-select: none;
		cursor: pointer;
		/* text-shadow: 1px 1px #fff; */
		font-weight: 700;
		font-size: 10pt;
		background-color: #464646;
		padding-top: 10px;
		padding-bottom: 10px;
		margin-bottom: 24px !important;
		color: ;
		color: #fff;
	}

	input.custom-file {
		height: 50px !important;
		padding: 0px !important;
	}

	.margin_file {
		width: 29%;
	}

	.declaration input[type="checkbox"]:not(old)+label,
	input[type="radio"]:not(old)+label {

		display: initial;
		padding-bottom: 10px !important;
	}

	.f_check span {
		margin-right: 77px;
	}

	.f_check input[type="checkbox"]:not(old)+label,
	input[type="radio"]:not(old)+label {}

	.form-group input:checked+label:after {
		content: '';
		display: block;
		position: absolute;
		top: 6px;
		left: 9px;
		width: 5px;
		height: 9px;
		border: solid #0079bf;
		border-width: 0 2px 2px 0;
		transform: rotate(45deg);
	}

	form.payment_tab {
		display: inherit;
	}

	.payment_tab img {
		display: inline-grid !important;
	}

	ul.images_inline {
		display: inline-flex;
		list-style: none;
		vertical-align: bottom;
		padding: 0px !important;
	}

	.payment_tab p {
		color: #999;
		font-size: 14px;
		font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
		font-weight: 600;
	}

	span.text_tab {
		color: #999;
		font-size: 14px;
		line-height: 0px;
	}

	.bs-wizard {
		margin-top: 40px;
	}

	/*Form Wizard*/
	.bs-wizard {
		border-bottom: solid 1px #e0e0e0;
		padding: 0 0 10px 0;
	}

	.bs-wizard>.bs-wizard-step {
		padding: 0;
		position: relative;
	}

	.bs-wizard>.bs-wizard-step+.bs-wizard-step {}

	.bs-wizard>.bs-wizard-step .bs-wizard-stepnum {
		color: #595959;
		font-size: 16px;
		margin-bottom: 5px;
	}

	.bs-wizard>.bs-wizard-step .bs-wizard-info {
		color: #999;
		font-size: 14px;
	}

	.bs-wizard>.bs-wizard-step>.bs-wizard-dot {
		position: absolute;
		width: 30px;
		height: 30px;
		display: block;
		background: #fbe8aa;
		top: 45px;
		left: 50%;
		margin-top: -15px;
		margin-left: -15px;
		border-radius: 50%;
	}

	.bs-wizard>.bs-wizard-step>.bs-wizard-dot:after {
		content: ' ';
		width: 14px;
		height: 14px;
		background: #fbbd19;
		border-radius: 50px;
		position: absolute;
		top: 8px;
		left: 8px;
	}

	.bs-wizard>.bs-wizard-step>.progress {
		position: relative;
		border-radius: 0px;
		height: 8px;
		box-shadow: none;
		margin: 20px 0;
	}

	.bs-wizard>.bs-wizard-step>.progress>.progress-bar {
		width: 0px;
		box-shadow: none;
		background: #fbe8aa;
	}

	.bs-wizard>.bs-wizard-step.complete>.progress>.progress-bar {
		width: 100%;
	}

	.bs-wizard>.bs-wizard-step.active>.progress>.progress-bar {
		width: 50%;
	}

	.bs-wizard>.bs-wizard-step:first-child.active>.progress>.progress-bar {
		width: 0%;
	}

	.bs-wizard>.bs-wizard-step:last-child.active>.progress>.progress-bar {
		width: 100%;
	}

	.bs-wizard>.bs-wizard-step.disabled>.bs-wizard-dot {
		background-color: #f5f5f5;
	}

	.bs-wizard>.bs-wizard-step.disabled>.bs-wizard-dot:after {
		opacity: 0;
	}

	.bs-wizard>.bs-wizard-step:first-child>.progress {
		left: 50%;
		width: 50%;
	}

	.bs-wizard>.bs-wizard-step:last-child>.progress {
		width: 50%;
	}

	.bs-wizard>.bs-wizard-step.disabled a.bs-wizard-dot {
		pointer-events: none;
	}

	/*END Form Wizard*/
	< !-- CODE FOR TAB SYSTEM --><style type="text/css">

	/* Style the tab content */
	.tabcontent {
		display: none;
	}

	/* Create an active/current tablink class */
	/*.active {
background-color: #c52228; color: white;
}
*/
	< !-- CODE FOR UPLOAD TWO RESPONSIVE DIVS -->.upload-content-area {
		/* border : 2px dotted #ccc; padding: 2px; */
	}

	.upload-content-area div {
		width: 100%;
		padding: 10px;
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	#one {
		background-color: whitesmoke;
	}

	#two {
		background-color: #f5f5f5;
	}


	/* FOLLOWING CODE IS JUST MAKE THE UPLOAD FIELD AND BUTTON FANCY */
	.input-container {
		text-align: left;
		padding: 1.50px !important;
		/*margin: 15px auto;*/
		max-width: 325px;
		background-color: #EDEDED;
		border: 1px solid #DFDFDF;
		border-radius: 5px;
	}

	input[type='file'] {
		display: none;
	}

	.file-info {
		font-size: 0.9em;
		margin-left: 5px;
		background-color: transparent;
		width: initial;
		border: none;
	}

	.file-info:focus {
		outline: none;
	}

	.browse-btn {
		background: #c52228;
		color: #fff;
		min-height: 35px;
		padding: 10px;
		border: none;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
	}

	.browse-btn:hover {
		background: #464646;
	}

	.bordered {
		position: relative;
		text-align: justify;
		display: table;
		width: 98%;
		/*margin: 20px auto;*/
		padding: 20px;
		/*border: 2px solid #dcdada;*/

		border-bottom: 1px #30b0c9 solid
	}

	.payment .bordered {
		position: relative;
		text-align: justify;
		display: table;
		width: 98%;
		margin: 20px auto;
		padding: 20px;
		border: 2px solid #dcdada;
		border-bottom: 1px #30b0c9 solid
	}

	.btns p.alignright {
		background: none;
		border-bottom: none;
		float: right;
	}

	.btns p.alignleft {
		float: left;
		border-bottom: none;
		background: none;
	}

	button.btn.left_btns {
		background-color: #30b0c9;
		border: 1px solid #30b0c9;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 20px;
		padding-right: 20px;
		border-radius: 3px;
		color: #fff;
	}

	button.btn.right_btns {
		background-color: #30b0c9;
		border: 1px solid #30b0c9;
		padding-top: 10px;
		padding-bottom: 10px;
		padding-left: 20px;
		padding-right: 20px;
		border-radius: 3px;
		color: #fff;
	}

	a#defaultOpen {
		background-color: #c52228;
		color: #fff !important;
	}

	span.step {
		background: #b5b2b2;
		border-radius: 0.8em;
		-moz-border-radius: 0.8em;
		-webkit-border-radius: 0.8em;
		color: #ffffff;
		display: inline-block;
		font-weight: bold;
		line-height: 1.6em;
		margin-right: 5px;
		text-align: center;
		width: 1.6em;
	}

	h2.appInfoH2.m_b10 {
		color: #0B6D76 !important;
		margin-top: 10px;
		text-align: left;
		font-size: 24px;
		margin-left: 10px;
	}

	.tab_1 {
		text-align: left;
		padding: 1.50px !important;
		margin: 0px;
		max-width: 325px;
		background-color: #EDEDED;
		border: 1px solid #DFDFDF;
		border-radius: 5px;
		margin-bottom: 10px;
	}

	.span_img {
		display: table-cell;
		vertical-align: bottom;
	}

	.span_img input[type="radio"] {
		vertical-align: top;
		display: inline;
		position: absolute;
		visibility: hidden;
	}

	.span_img img {
		display: inline;
		height: 50px;
		width: 100%;
	}

	.width_tab {

		display: table-cell;
		padding-left: 10px;
	}

	section.study_china {}

	i.fa.fa-arrow-down {
		line-height: 2.1;
	}

	.main_tabs h3 {
		color: #0B6D76;
		margin: 23px 0px 10px;
		width: 100%;
	}

	.payStep {
		position: relative;
		width: 100%;
		height: 120px;
	}

	.payStepList li a {
		padding: 0 !important;
	}

	.payStepNow {
		position: absolute;
		top: 60px;
		left: 200px;
		width: 265px;
		height: 35px;
		background: url(img/payStep.png) repeat-x 0 0px;
		z-index: 1;
	}

	.payStepBg {
		position: absolute;
		top: 60px;
		left: 200px;
		width: 565px;
		height: 35px;
		background: url(img/payStep.png) repeat-x 0 -93px;
	}

	.payStepList {
		position: absolute;
		top: 20px;
		left: 150px;
		z-index: 2;
		padding: 0 !important;
	}

	.payStepList li {
		text-align: center;
		width: 145px;
		float: left;
		display: inline-block;
		margin: 0 118px 0 0;
	}

	.payStepList li a.active {
		background: url(img/btn.png) no-repeat -99px -344px;
		color: #FFF;
	}

	.payStep .p_r1 {
		padding-right: 10px;
	}

	.payStepList li span {
		font-size: 16px;
		color: #FFF;
		font-weight: bolder;
	}

	.payStepList li a {
		display: block;
		height: 30px;
		line-height: 20px;
		margin: 0 0 15px;
		font-size: 12px;
		color: #333;
		text-decoration: none;
		cursor: pointer;
	}

	.payStep .p_r2 {
		padding-right: 6px;
	}

	.payStep .p_r3 {
		padding-right: 2px;
	}

	.appPayTabA {
		width: 100%;
	}

	.m_b20 {
		margin-bottom: 20px;
	}

	table,
	td,
	tr,
	th {
		font-size: 13px;
	}

	.appPayTabA th {
		font-weight: normal;
		text-align: left;
		vertical-align: top;
		padding: 5px 30px;
		border-bottom: 3px solid #B3D4E7;
		border-left: 1px solid #FFF;
		color: #777;
	}

	.appPayTabA td {
		vertical-align: top;
		padding: 20px 30px;
		line-height: 18px;
		border-bottom: 1px solid #D8E9F3;
		background: #F7FCFF;
	}

	.appPayTabA tr:nth-child(odd) {
		background-color: #fff;
	}

	.appPayTabA td span.red {
		color: #E82312;
	}

	.discount .buttn {
		padding: 10px 20px;
		background: #0A74B9;
		color: #fff;
		border: none;
		border-radius: 3px;
		margin-left: 10px;
	}

	.discount .inpt {
		height: 30px;
		margin: 0 0 15px;
		border: 1px solid #d8d8d8;
		text-indent: 1px;
	}

	.discount,
	.discount p {
		font-size: 13px;
		line-height: 24px;
		font-family: "cucas", Arial, Helvetica, sans-serif;
		color: #333;
		text-align: left;
	}

	.discount .use {
		padding: 0 20px;
		background: #0A74B9;
		color: #fff;
		border: none;
		border-radius: 3px;
		margin-left: 10px;
	}

	.discount .jian_usd {
		float: right;
		width: 166px;
		color: #E82312;
		padding: 0 33px;
		text-align: right;
	}

	.appPayment {
		line-height: 50px;
		padding: 0 20px;
		text-align: right;
		border: 1px solid #D8E9F3;
		background: #F7FCFF;
	}

	.AppBtnTab tr {
		background: #fff !important;
	}

	.AppBtnTab {
		width: 100%;
	}

	.AppBtnTab th {
		text-align: right;
	}

	.appBtnReturn {
		display: inline-block;
		width: 175px;
		height: 32px;
		line-height: 32px;
		text-align: center;
		color: #0A74B9;
		border: none;
		cursor: pointer;
		background: url(img/btn.png) no-repeat 0 -447px;
	}

	.m_r10 {
		margin-right: 10px;
	}

	.appBtnGo {
		display: inline-block;
		width: 154px;
		height: 44px;
		line-height: 44px;
		text-align: center;
		color: #FFF;
		font-size: 18px;
		font-weight: bolder;
		border: none;
		cursor: pointer;
		background: url(img/btn.png) no-repeat -98px -252px;
	}

	.appStepBox {
		overflow: hidden;
		clear: both;

		position: relative;
	}

	.appSubBox {
		overflow: hidden;
		clear: both;
		border: 2px solid #DBDBDB;
		background: #FFF;
	}

	.m_t20 tr {
		background: none !important;
	}

	.m_t20 p {
		padding-top: 7px;
	}

	.m_t20 {}

	.appSubText {
		width: 690px;
		float: left;
		/*background: #F6F6F6;*/
	}

	.p20 {
		padding: 20px;
	}

	.appSubText p {
		font-size: 16px;
	}

	.appSubText table {
		background: url(img/icon1.png) no-repeat 0 -887px;
	}

	.appSubText table td {
		padding: 0px 10px;
		line-height: 10px;
	}

	.appSubText table td a {
		text-decoration: none;
		color: #0A74B9;
		outline: none;
		padding: 13px 4px !important;
	}

	.appSubText table td span {
		color: #E82312;
	}

	.appSubHeight {
		height: 194px;
	}

	.appSubBtn {
		float: left;
		background: url(img/btn.png) no-repeat -338px 0 #FFF;
		width: 220px;
		padding: 30px 0 30px 30px;
	}

	.appSubmitB {
		background: url(img/btn.png) no-repeat 0px -565px;
		color: #FFF;
	}

	.appSubmit {
		display: block;
		width: 154px;
		height: 54px;
		line-height: 54px;
		text-align: center;
		font-size: 24px;
		font-weight: bolder;
		border: none;
		cursor: pointer;
	}

	#application_form {
		min-height: 750px;
		margin-bottom: 40px;
	}

	.nav-divs {
		display: inline-block;
	}

	.check_main .steps {
		text-transform: uppercase;
		color: #0B6D76;
		font-size: 13px;
	}

	.label__control {
		display: block;
		color: #464646;
		font-family: Helvetica, Helvetica Neue, Arial, sans-serif;
		font-size: 11px;
		font-weight: 700;
		letter-spacing: .15px;
		line-height: 1.461;
	}

	.help-block2 {
		position: relative;
		font-size: 10px;
		color: #878787;
		top: -3px;
	}

	.check_main.active {
		background: #0B6D76 !important;
	}

	.check_main.active span {
		color: #ffffff;
	}

	.next-btn {
		background-color: #c52228;
		color: white;
		padding: 9px 19px;
		border: none;
		font-size: 13px;
		position: relative;
		right: 16px;
		top: 20px;
	}

	.prev-btn {
		background-color: #c52228;
		color: white;
		padding: 9px 19px;
		border: none;
		font-size: 13px;
		position: relative;
		left: 16px;
		top: 20px;
	}

	.add-btn {
		background-color: #c52228;
		color: white;
		padding: 9px 16px;
		border: none;
		font-size: 12px;
		position: relative;
		top: -2px;
	}

	.w3-teal {
		background: #fff;
		box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
		padding: 0px 20px;
	}

	.has_error input {
		border: solid 1px #ff000063;
	}

	.has_error select {
		border: solid 1px #ff000063;
		border-radius: 4px;
	}

	.has_error textarea {
		border: solid 1px #ff000063;
		border-radius: 4px;
	}

	.error-block {
		font-size: 10px;
		font-weight: bold;
		color: #ff0000a6;
		position: relative;
		top: -3px;
	}

	.main_tabs section {
		display: none;
	}

	.main_tabs section.active {
		display: block;
	}

	.required_declaration {
		color: red;
		font-size: 11px;
		position: relative;
		top: -15px;
		left: 20px;
		display: none;
	}

	.nav-fill .tablinks {
		cursor: pointer;
	}

	.btn-other {
		background-color: #c52228;
		border: 1px solid #c52228;
		padding-top: 0px;
		padding-bottom: 3px;
		padding-left: 7px;
		padding-right: 8px;
		border-radius: 50px;
		font-size: 17px;
		margin-left: 2px;
		color: #fff;
		outline: none;
		height: 27px;
		position: relative;
		top: -3px;
	}

	.p-bordered {
		background-color: transparent !important;
		border: none !important;
		margin: 0px !important;
		padding: 0px !important;
		font-size: 11px !important;
		line-height: 11px !important;
		position: relative;
		color: #999 !important;
		font-family: Helvetica, Helvetica Neue, Arial, sans-serif !important;
		font-weight: 600 !important;
	}

	.data_tab {
		color: #6d6d6d !important;
		font-weight: bold;
		font-size: 13px;
	}

	.payment-table {
		width: 100%;
	}

	.payment-table td {
		padding: 3px;
		background-color: transparent;
		text-align: center;
	}

	.payment-table td p {
		text-align: center;
	}

	.dashboard-top-column-main {
		margin-top: 30px;
	}

	.dahsboard-heading {
		font-size: 16px; 
		font-weight: 400;
		line-height: 18px;
		color: #000 !important;
		text-transform: capitalize;
	}

	.datepicker--cell{
		color: #000;
	}
	.datepicker--cell:hover{
		background: #0B6D76!important;
		color: #fff !important;
	}
	.datepicker--cell.active{
		background: #0B6D76!important;
		color: #fff !important;
	}

	/* media quyeries */
	@media (max-width: 300px) {
		button {
			width: 100%;
			border-top-right-radius: 5px;
			border-bottom-left-radius: 0;
		}

		.file-info {
			display: block;
			margin: 10px 5px;
		}
	}

	@media only screen and (max-width : 1024px) {
		#application_form {
			margin-top: 100px;
		}
	}

	@media only screen and (max-device-width : 1200px) {
		.w3-sidebar {
			/* height: 100%; */
			/*padding-left: 10px;*/

		}

		.w3-sidebar {

			background-color: #fff;
			position: initial;

			/*width: 100% !important;*/
		}

		.main_tabs {
			margin-left: 0px;
			margin-top: 0px;
		}

		.main_tabs section {
			/* width: calc(100% - 290px); */
			/* float: left; */
			margin-left: 20px
		}
	}

	@media only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
		span.text_tab {

			line-height: 17px;
		}

		.span_img {
			display: inline-block;

		}

		.grid--space.f_grid {
			margin-top: 97px;
		}

		.apply_detail a {
			padding: 10px 23px !important;

		}

		.w3-sidebar {
			/* height: 100%; */
			background-color: #fff;
			position: initial;

			/*width: 100% !important;*/
		}

		.main_tabs {
			margin-left: 20;
			margin-top: 0px;
		}
	}

	@media (min-width: 320px) and (max-width: 767px) {

		.checkbox-inline,
		.radio-inline {

			margin-right: 28px !important;
			width: 22% !important;
		}

		.main_tabs section {
			/* width: 100% !important; */
			margin-left: 20px !important;
			margin-right: 20px;
		}

		select.ally-focus-within {
			width: 50% !important;
		}

		.span_img {
			display: inline-block;
			vertical-align: top;
		}


		.bordered {

			padding: 15px;

		}

		span.text_tab {

			line-height: 15px;
		}

		.apply_detail a {



			font-size: 13px;

		}

		textarea.span_text {

			width: 100%;
		}

		.w3-container.main_side {

			padding-left: 10px;

			padding-right: 10px;
		}

		.main_side .form-group input {

			width: 100%;

		}

		.main_side select {

			width: 100% !important;

		}

		.w3-light-grey.w3-bar-block {
			width: 100% !important;
			/* margin: 0 auto; */
			margin-bottom: 20px;
			background-color: transparent !important;
			border: none !important;
			display: flex;
			align-items: center;
			flex-wrap: wrap;
			justify-content: space-between;
			max-width: 100% !important;
		}

		.form-group.check_main {
			margin-bottom: 7px !important;
			padding: 15px 0px;
			transition: all ease-in-out 0.3s;
			font-weight: bold;
			position: relative;
			width: 100%;
			border: none;
			max-width: calc(50% - 7.5px);
			margin-left: 0px;
		}

		.w3-light-grey.w3-bar-block form {
			max-width: 300px !important;
			margin: 0 auto;
		}

		.w3-sidebar {

			position: initial;

		}

		.apply_detail a {

			width: 100%;
		}

		section.study_china {

			margin-left: 0px !important;
		}

		.w3-container.main_side {}

		.grid--space.f_grid {
			margin-top: 89px;
		}

		div#nav-tab {
			display: inline-grid;
		}

		span.step {

			float: left;
		}

		nav>div a.nav-item.nav-link.active:after {


			display: none;

		}

		.f_alert {

			line-height: 1.3;
		}

		.bordered {

			width: 100%;

		}

		.payStep {

			display: none;
		}

		.dashboard-top-column-main {
			margin-top: 80px !important;
		}
	}

	@media screen and (min-width: 600px) {
		.upload-content-area {
			height: auto;
			overflow: hidden;
		}

		#one {
			border-radius: 3px;
			float: left;
			display: inline-block;
			padding: 10px;
			max-width: 69%;

		}

		#two {
			border-radius: 3px;
			float: right;
			display: inline-block;
			padding: 10px;
			max-width: 30%;
		}
	}
</style>
@endsection
@section('content')


	<section>
		<div class="nmargin" id="application_form">
			<div class="container apply_detail">
				<div class="dashbaord-tab-content-main">
					<div class="row">
						<div class="col-sm-12 dashboard-top-column-main">
							<p class="dahsboard-heading">You're applying for {{$data->name}} of {{$data->university->name}}</p>
							<div class="alert alert-warning f_alert" style="margin: 10px 0px;"><strong>Warning!</strong> Compulsory fields are marked with an asterisk (*).</div>
						</div>
						<div class="col-md-4">
							<div class="w3-sidebar w3-light-grey w3-bar-block" style="max-width: 300px; width:100%;">
								<div class="form-group check_main active" data-tab="personal_info">
									<span class="steps">Step 1</span>
									<span>Personal Information</span>
									<i class="fa fa-thumbs-up" @if(isset($app->personal_information) && $app->personal_information !== null) style="display:block;" @endif></i>
								</div>
								<div class="form-group check_main" data-tab="educational_background">
									<span class="steps">Step 2</span>
									<span>Educational Background</span>
									<i class="fa fa-thumbs-up" @if(isset($app->educational_background) && $app->educational_background !== null) style="display:block;" @endif></i>
								</div>
								<div class="form-group check_main" data-tab="language_qual">
									<span class="steps">Step 3</span>
									<span>Language Qualification</span>
									<i class="fa fa-thumbs-up" @if(isset($app->language_qualification) && $app->language_qualification !== null) style="display:block;" @endif></i>
								</div>
{{--								<div class="form-group check_main" data-tab="financial">--}}
{{--									<span class="steps">Step 4</span>--}}
{{--									<span>Financial Support</span>--}}
{{--									<i class="fa fa-thumbs-up" @if(isset($app->financial_support) && $app->financial_support !== null) style="display:block;" @endif></i>--}}
{{--								</div>--}}
								<div class="form-group check_main" data-tab="mailing">
									<span class="steps">Step 4</span>
									<span>Mailing Address</span>
									<i class="fa fa-thumbs-up" @if(isset($app->mailling_address) && $app->mailling_address !== null) style="display:block;" @endif></i>
								</div>
{{--								<div class="form-group check_main" data-tab="declaration">--}}
{{--									<span class="steps">Step 6</span>--}}
{{--									<span>Declaration</span>--}}
{{--									<i class="fa fa-thumbs-up" @if($current==1) @if(isset($app->declaration) && $app->declaration !== 0) style="display:block;" @endif @endif></i>--}}
{{--								</div>--}}
								<div class="form-group check_main" data-tab="uploads">
									<span class="steps">Step 5</span>
									<span>Uploads Documents</span>
									<i class="fa fa-thumbs-up" @if($current==1) @if(isset($app->uploads) && $app->uploads !== null) style="display:block;" @endif @endif></i>
								</div>
								<div class="form-group check_main submit-final" data-tab="submit">
									<span class="steps">Final Step</span>
									<span>Complete</span>
									<i class="fa fa-thumbs-up" @if($current==1) @if(isset($app->status) && $app->status !== 4) style="display:block;" @endif @endif></i>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<div class="row">
								<div class="main_tabs">
									<section class="personal_info active">
										<div class="w3-container w3-teal row">
											<div class="col-sm-12">
												<h3>Personal Information</h3>
												<h2>Study Plan</h2>

												<form class="form_submit mt-4" data-next="educational_background" data-current="personal_info">
												<div class="row">

													<div class="w3-container main_side col-sm-6" align="left">

														<div :class="(errors.first_name)?'form-group has_error':'form-group'">
															<label class="label__control">Given/First Name 
																<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="first_name" v-model="personal_info.first_name" placeholder="First Name">
															<span class="error-block" v-if="errors.first_name" v-for="error in errors.first_name" v-text="error"></span>
														</div>

														<div :class="(errors.last_name)?'form-group has_error':'form-group'">
															<label class="label__control">Family Name/Surname 
																<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="last_name" v-model="personal_info.last_name" placeholder="Surname ">
															<span class="error-block" v-if="errors.last_name" v-for="error in errors.last_name" v-text="error"></span>
														</div>

{{--														<div :class="(errors.chinese_name)?'form-group has_error':'form-group'">--}}
{{--															<label class="label__control">Chinese Name</label>--}}
{{--															<input type="text" class="form-control" name="chinese_name" v-model="personal_info.chinese_name" placeholder="Chinese Name">--}}
{{--															<span class="help-block2">If applicable</span>--}}
{{--															<span class="error-block" v-if="errors.chinese_name" v-for="error in errors.chinese_name" v-text="error"></span>--}}
{{--														</div>--}}

														<div :class="(errors.gender)?'form-group has_error':'form-group'">
															<label class="label__control">Gender<span class="label__required">*</span></label>
															<select class="change_select" name="gender" data-name="gender">
															<option value="male" selected>Gender</option>
																<option value="male" :selected="personal_info.gender == 'male'">Male</option>
																<option value="female" :selected="personal_info.gender == 'female'">Female</option>
															</select>
															<span class="error-block" v-if="errors.gender" v-for="error in errors.gender" v-text="error"></span>
														</div>

														<div :class="(errors.dob)?'form-group has_error':'form-group'">
															<label class="label__control">Date of Birth
																<span class="label__required">*</span></label>
															<input type="text" class="form-control change_select datepicker-autoclose" data-name="dob" name="dob" readonly data-date-format="yyyy-mm-dd" data-language="en" :value="personal_info.dob" placeholder="Date of Birth">
															<span class="error-block" v-if="errors.dob" v-for="error in errors.dob" v-text="error"></span>
														</div>

														<div :class="(errors.nationality)?'form-group has_error':'form-group'">
															<label class="label__control">Nationality
																<span class="label__required">*</span></label>
{{--															<select class="change_select" name="nationality" data-name="nationality">--}}
{{--																<option v-if="country.length>0" v-for="country in countries" :value="country" :selected="(personal_info.nationality == country) ? true : false" v-text="country"></option>--}}
{{--															</select>--}}
															<input type="text" class="form-control" name="passport" v-model="personal_info.nationality" placeholder="Nationality">
															<span class="error-block" v-if="errors.nationality" v-for="error in errors.nationality" v-text="error"></span>
														</div>

														<div :class="(errors.passport)?'form-group has_error':'form-group'">
															<label class="label__control">Passport No
																<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="passport" v-model="personal_info.passport" placeholder="Passport Number">
															<span class="error-block" v-if="errors.passport" v-for="error in errors.passport" v-text="error"></span>
														</div>

														<div :class="(errors.valid_until)?'form-group has_error':'form-group'">
															<label class="label__control">Passport Validity
																<span class="label__required">*</span></label>
															<input type="text" class="form-control change_select datepicker-autoclose" data-name="valid" readonly data-date-format="yyyy-mm-dd" data-language="en" :value="personal_info.valid_until" placeholder="Passport Validity Date">
															<span class="error-block" v-if="errors.valid_until" v-for="error in errors.valid_until" v-text="error"></span>
														</div>

														<div :class="(errors.marital_status)?'form-group has_error':'form-group'">
															<label class="label__control">Marital Status 
																<span class="label__required">*</span></label>
															<select class="change_select" name="marital_status" data-name="marital">
																<option value="single" :selected="personal_info.marital_status == 'single'">Single</option>
																<option value="married" :selected="personal_info.marital_status == 'married'">Married</option>
															</select>
															<span class="error-block" v-if="errors.marital_status" v-for="error in errors.marital_status" v-text="error"></span>
														</div>

													</div>

													<div class="w3-container main_side col-sm-6" align="left">

														<!-- <div style="height:25px;"></div> -->

														<div :class="(errors.religion)?'form-group has_error':'form-group'">
															<label class="label__control">Religion</label>
															<input type="text" class="form-control" name="religion" v-model="personal_info.religion" placeholder="Religion">
															<span class="error-block" v-if="errors.religion" v-for="error in errors.religion" v-text="error"></span>
														</div>

														<div :class="(errors.previous_education)?'form-group has_error':'form-group'">
															<label class="label__control">Previous Education
																<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="previous_education" v-model="personal_info.previous_education" placeholder="Previous Education">
															<span class="error-block" v-if="errors.previous_education" v-for="error in errors.previous_education" v-text="error"></span>
														</div>

														<div :class="(errors.field_of_study)?'form-group has_error':'form-group'">
															<label class="label__control">Field Of Study
																<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="field_of_study" v-model="personal_info.field_of_study" placeholder="Field Of Study">
															<span class="error-block" v-if="errors.field_of_study" v-for="error in errors.field_of_study" v-text="error"></span>
														</div>

														<!-- <h2>Current Contact</h2> -->

														<div :class="(errors.c_address)?'form-group has_error':'form-group'">
															<label class="label__control">Current Address<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="c_address" v-model="personal_info.c_address" placeholder="Current Address">
															<span class="error-block" v-if="errors.c_address" v-for="error in errors.c_address" v-text="error"></span>
														</div>

														<div :class="(errors.c_phone)?'form-group has_error':'form-group'">
															<label class="label__control">Current Tele<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="c_phone" v-model="personal_info.c_phone" placeholder="Current Tele">
															<span class="error-block" v-if="errors.c_phone" v-for="error in errors.c_phone" v-text="error"></span>
														</div>

														<!-- <h2>Permanent Contact</h2> -->

														<div :class="(errors.p_address)?'form-group has_error':'form-group'">
															<label class="label__control">Permanent Address<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="p_address" v-model="personal_info.p_address" placeholder="Permanent Address">
															<span class="error-block" v-if="errors.p_address" v-for="error in errors.p_address" v-text="error"></span>
														</div>

														<div :class="(errors.p_phone)?'form-group has_error':'form-group'">
															<label class="label__control">Permanent Tele<span class="label__required">*</span></label>
															<input type="text" class="form-control" name="p_phone" v-model="personal_info.p_phone" placeholder="Permanent Tele">
															<span class="error-block" v-if="errors.p_phone" v-for="error in errors.p_phone" v-text="error"></span>
														</div>
													</div>

													<div class="w3-container main_side col-sm-12 mt-3" align="center" style="height:100px;">
														<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Done</button>
													</div>

												</div>
												</form>
											</div>
										</div>
									</section>

									<section class="educational_background">
										<div class="w3-container w3-teal row">
											<div class="col-sm-12">

											<h3>Educational Background</h3>

											<form class="form_submit" action="javascript:;" data-next="language_qual" data-current="educational_background">

											<div style="padding: 15px;"></div>
											<div class="w3-container main_side row">
																
												<div class="col-sm-4">
													<div :class="(errors.school_name)?'form-group has_error':'form-group'">
														<label class="label__control">School Name 
															<span class="label__required">*</span></label>
														<input type="text" class="form-control" v-model="edu_single.school_name" placeholder="School Name " >
														<span class="error-block" v-if="errors.school_name" v-for="error in errors.school_name" v-text="error"></span>
													</div>
												</div>

												<div class="col-sm-4">
													<div :class="(errors.field_of_study)?'form-group has_error':'form-group'">
														<label class="label__control">Field Of Study
															<span class="label__required">*</span></label>
														<input type="text" class="form-control" v-model="edu_single.field_of_study" placeholder="Field Of Study">
														<span class="error-block" v-if="errors.field_of_study" v-for="error in errors.field_of_study" v-text="error"></span>
													</div>
												</div>

												<div class="col-sm-4">
													<div :class="(errors.diploma_received)?'form-group has_error':'form-group'">
														<label class="label__control">Diploma Received
															<span class="label__required">*</span></label>
														<input type="text" class="form-control" v-model="edu_single.diploma_received" placeholder="Diploma Received">
														<span class="error-block" v-if="errors.diploma_received" v-for="error in errors.diploma_received" v-text="error"></span>
													</div>
												</div>

												<div class="col-sm-4">
													<div :class="(errors.date_of_started)?'form-group has_error':'form-group'">
														<label class="label__control">Date Of Started
															<span class="label__required">*</span></label>
														<input type="text" class="form-control change_select datepicker-autoclose" readonly data-date-format="yyyy-mm-dd" data-name="date_of_started" v-model="edu_single.date_of_started" data-language="en" placeholder="Date Of Started">
														<span class="error-block" v-if="errors.date_of_started" v-for="error in errors.date_of_started" v-text="error"></span>
													</div>
												</div>

												<div class="col-sm-4">
													<div :class="(errors.date_of_graduation)?'form-group has_error':'form-group'">
														<label class="label__control">Date Of Graduation
															<span class="label__required">*</span></label>
														<input type="text" class="form-control change_select datepicker-autoclose" readonly data-date-format="yyyy-mm-dd" data-name="date_of_graduation" v-model="edu_single.date_of_graduation" data-language="en" placeholder="Date Of Graduation">
														<span class="error-block" v-if="errors.date_of_graduation" v-for="error in errors.date_of_graduation" v-text="error"></span>
													</div>
												</div>

												<div class="col-sm-4">
													<button type="button" class="btn btn-primary ml-2 dashboard-button next-btn add-btn add-edu " style="position:static; margin-left:0px !important; margin-top:20px !important;">Add</button>
												</div>
											</div>
											<p align="center" class="edu_status" style="background-color: transparent;border: none;color: red;display:none;">All above fields are required</p>

											<div class="w3-container main_side" v-if="edu.length>0">
												<div class="table-responsive uni_table">
													<table class="table">
														<thead>
															<tr>
																<th style="font-weight:bold;text-align:center;">School Name</th>
																<th style="font-weight:bold;text-align:center;">Field Of Study</th>
																<th style="font-weight:bold;text-align:center;">Diploma Received</th>
																<th style="font-weight:bold;text-align:center;">Date Of Started</th>
																<th style="font-weight:bold;text-align:center;">Date Of Graduation</th>
																<th style="font-weight:bold;text-align:center;">Action</th>
															</tr>
														</thead>
														<tbody>
															<tr v-for="educ,key in edu">
																<td style="text-align:center;" v-text="educ.school_name"></td>
																<td style="text-align:center;" v-text="educ.field_of_study"></td>
																<td style="text-align:center;" v-text="educ.diploma_received"></td>
																<td style="text-align:center;" v-text="educ.date_of_started"></td>
																<td style="text-align:center;" v-text="educ.date_of_graduation"></td>
																<td style="text-align:center;cursor:pointer"><i class="fa fa-trash" @click="removeEdu(key)"></i></td>
															</tr>
														</tbody>
													</table>
												</div>
											</div>
											
											<div class="w3-container main_side col-sm-12" style="height:100px;">
												<div style="width: 50%;float:left;" align="left">
													<button type="button" class="btn btn-primary dashboard-button next-btn prev-btn" data-prev="personal_info">Previous</button>
												</div>
												<div style="width: 50%;float:left;" align="right">
													<button type="submit" class=" btn btn-primary ml-2 dashboard-button next-btn next-btn">Done</button>
												</div>
											</div>
											</form>

											</div>

										</div>
									</section>

									<section class="language_qual">
						
										<div class="w3-container w3-teal row">
											<div class="col-sm-12">
												<h3>Language Qualification</h3>
												<h2>English Proficiency</h2>
												<div style="padding: 15px;"></div>

												<form class="form_submit" data-next="mailing" data-current="language_qual">
												
												{{-- <div class="w3-container main_side col-sm-6" >
													
													<h2>Chinese Proficiency</h2>
													<div :class="(errors.learned_chinese)?'form-group has_error':'form-group'">
														<label class="label__control">Have you ever learned Chinese before?
															<span class="label__required">*</span></label>
														<select class="change_select" name="learned_chinese" data-name="learned_chinese">
															<option value="No">No</option>
															<option value="Yes">Yes</option>
														</select>
														<span class="error-block" v-if="errors.learned_chinese" v-for="error in errors.learned_chinese" v-text="error"></span>
													</div>

													<div :class="(errors.how_long)?'form-group has_error':'form-group'">
														<label class="label__control">Please indicate how long have you studied Chinese?</label>
														<input type="text" name="how_long" class="form-control" v-model="qual.how_long">
														<span class="error-block" v-if="errors.how_long" v-for="error in errors.how_long" v-text="error"></span>
													</div>

													<div :class="(errors.hsk_level)?'form-group has_error':'form-group'">
														<label class="label__control">HSK Level/Level of HSK</label>
														<select class="change_select" name="hsk_level" data-name="hsk">
															<option value="level 1">Level 1</option>
															<option value="level 2">Level 2</option>
															<option value="level 3">Level 3</option>
															<option value="level 4">Level 4</option>
															<option value="level 5">Level 5</option>
															<option value="level 6">Level 6</option>
															<option value="level 7">Level 7</option>
															<option value="level 8">Level 8</option>
														</select>
														<span class="error-block" v-if="errors.hsk_level" v-for="error in errors.hsk_level" v-text="error"></span>
													</div>
												</div> --}}

												<div class="w3-container main_side col-sm-6" >
													
													<div :class="(errors.is_english)?'form-group has_error':'form-group'">
														<label class="label__control">Is English the official Language in your country?
															<span class="label__required">*</span></label>
														<select class="change_select" name="is_english" data-name="is_english">
															<option value="No">No</option>
															<option value="Yes">Yes</option>
														</select>
														<span class="error-block" v-if="errors.is_english" v-for="error in errors.is_english" v-text="error"></span>
													</div>

													<div :class="(errors.native_language)?'form-group has_error':'form-group'">
														<label class="label__control">My native language is</label>
														<input type="text" name="native_language" class="form-control" v-model="qual.native_language" placeholder="My native language is">
														<span class="error-block" v-if="errors.native_language" v-for="error in errors.native_language" v-text="error"></span>
													</div>

													
												</div>
												
												<div class="w3-container main_side col-sm-12" style="height:100px;">
													<div style="width: 50%;float:left;" align="left">
														<button type="button" class="btn btn-primary ml-2 dashboard-button prev-btn" data-prev="educational_background">Previous</button>
													</div>
													<div style="width: 50%;float:left;" align="right">
														<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Done</button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</section>
										
									<section class="financial">

										<div class="w3-container w3-teal row">
											<div class="col-sm-12">
												<h3>Source of Financial Support</h3>
												<div style="padding: 15px;"></div>

												<form class="form_submit " action="javascript:;" data-next="mailing" data-current="financial">
												<div class="row">
													<div class="w3-container main_side col-sm-6" >
														
														{{-- <h2>Chinese Proficiency</h2> --}}
														<div :class="(errors.source_of_financial)?'form-group has_error':'form-group'">
															<label class="label__control">Source of Financial Support/Source of funding
																<span class="label__required">*</span></label>
															<select class="change_select" name="source_of_financial" data-name="source_of_financial">
																<option value="Scholarship">Scholarship</option>
																<option value="Self Supporting">Self Supporting</option>
																<option value="Other">Other</option>
															</select>
															<span class="error-block" v-if="errors.source_of_financial" v-for="error in errors.source_of_financial" v-text="error"></span>
														</div>

														<div :class="(errors.financial_guarantor)?'form-group has_error':'form-group'">
															<label class="label__control">Financial Guarantor/financial support will be provided by<span class="label__required">*</span></label>
															<input type="text" name="financial_guarantor" class="form-control" v-model="financial.financial_guarantor">
															<span class="error-block" v-if="errors.financial_guarantor" v-for="error in errors.financial_guarantor" v-text="error"></span>
														</div>

														<div :class="(errors.relationship)?'form-group has_error':'form-group'">
															<label class="label__control">Relationship with Financial Guarantor
																<span class="label__required">*</span></label>
															<input type="text" name="relationship" class="form-control" v-model="financial.relationship">
															<span class="error-block" v-if="errors.relationship" v-for="error in errors.relationship" v-text="error"></span>
														</div>

														<div :class="(errors.occupation)?'form-group has_error':'form-group'">
															<label class="label__control">Occupation</label>
															<input type="text" name="occupation" class="form-control" v-model="financial.occupation">
															<span class="error-block" v-if="errors.occupation" v-for="error in errors.occupation" v-text="error"></span>
														</div>
														
													</div>

													<div class="w3-container main_side col-sm-6" >
														
														
														<div :class="(errors.address)?'form-group has_error':'form-group'">
															<label class="label__control">Address of Financial Guarantor</label>
															<input type="text" name="address" class="form-control" v-model="financial.address">
															<span class="error-block" v-if="errors.address" v-for="error in errors.address" v-text="error"></span>
														</div>

														<div :class="(errors.tel)?'form-group has_error':'form-group'">
															<label class="label__control">Tel</label>
															<input type="text" name="tel" class="form-control" v-model="financial.tel">
															<span class="error-block" v-if="errors.tel" v-for="error in errors.tel" v-text="error"></span>
														</div>

														<div :class="(errors.phone)?'form-group has_error':'form-group'">
															<label class="label__control">Cell Phone Number<span class="label__required">*</span></label>
															<input type="text" name="phone" class="form-control" v-model="financial.phone">
															<span class="error-block" v-if="errors.phone" v-for="error in errors.phone" v-text="error"></span>
														</div>

														<div :class="(errors.email)?'form-group has_error':'form-group'">
															<label class="label__control">Email</label>
															<input type="email" name="email" class="form-control" v-model="financial.email">
															<span class="error-block" v-if="errors.email" v-for="error in errors.email" v-text="error"></span>
														</div>
														
													</div>
												</div>
												<div class="w3-container main_side col-sm-12" style="height:100px;">
													<div style="width: 50%;float:left;" align="left">
														<button type="button" class="btn btn-primary ml-2 dashboard-button prev-btn" data-prev="family_mem">Previous</button>
													</div>
													<div style="width: 50%;float:left;" align="right">
														<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Done</button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</section>
									
									<section class="mailing">

										<div class="w3-container w3-teal row">
											<div class="col-sm-12">
												<h3>Mailing Address</h3>

												<form class="form_submit" action="javascript:;" data-next="uploads" data-current="mailing">
												<div class="row">
													<div class="w3-container main_side col-sm-6">
														
														<div :class="(errors.name)?'form-group has_error':'form-group'">
															<label class="label__control">Name<span class="label__required">*</span></label>
															<input type="text" name="name" class="form-control" v-model="mailing.name" placeholder="Full Name">
															<span class="error-block" v-if="errors.name" v-for="error in errors.name" v-text="error"></span>
														</div>

														<div :class="(errors.tel)?'form-group has_error':'form-group'">
															<label class="label__control">Tel<span class="label__required">*</span></label>
															<input type="text" name="tel" class="form-control" v-model="mailing.tel" placeholder="Tele Number">
															<span class="error-block" v-if="errors.tel" v-for="error in errors.tel" v-text="error"></span>
														</div>

														<div :class="(errors.phone)?'form-group has_error':'form-group'">
															<label class="label__control">Cell Phone
																<span class="label__required">*</span></label>
															<input type="text" name="phone" class="form-control" v-model="mailing.phone" placeholder="Phone Number">
															<span class="error-block" v-if="errors.phone" v-for="error in errors.phone" v-text="error"></span>
														</div>

														<div :class="(errors.building)?'form-group has_error':'form-group'">
															<label class="label__control">Building
															<span class="label__required">*</span></label>
															<input type="text" name="building" class="form-control" v-model="mailing.building" placeholder="Building">
															<span class="error-block" v-if="errors.building" v-for="error in errors.building" v-text="error"></span>
														</div>
													</div>

													<div class="w3-container main_side col-sm-6" >
														
														
														<div :class="(errors.street)?'form-group has_error':'form-group'">
															<label class="label__control">Street
															<span class="label__required">*</span></label>
															<input type="text" name="street" class="form-control" v-model="mailing.street" placeholder="Street">
															<span class="error-block" v-if="errors.street" v-for="error in errors.street" v-text="error"></span>
														</div>

														<div :class="(errors.city)?'form-group has_error':'form-group'">
															<label class="label__control">City
															<span class="label__required">*</span></label>
															<input type="text" name="city" class="form-control" v-model="mailing.city" placeholder="City">
															<span class="error-block" v-if="errors.city" v-for="error in errors.city" v-text="error"></span>
														</div>

														<div :class="(errors.country)?'form-group has_error':'form-group'">
															<label class="label__control">Country<span class="label__required">*</span></label>
															<input type="text" name="country" class="form-control" v-model="mailing.country" placeholder="Country">
															<span class="error-block" v-if="errors.country" v-for="error in errors.country" v-text="error"></span>
														</div>

														<div :class="(errors.postcode)?'form-group has_error':'form-group'">
															<label class="label__control">Postal Code
															<span class="label__required">*</span></label>
															<input type="text" name="postcode" class="form-control" v-model="mailing.postcode" placeholder="Postal Code">
															<span class="error-block" v-if="errors.postcode" v-for="error in errors.postcode" v-text="error"></span>
														</div>
													</div>
												</div>
												<div class="w3-container main_side col-sm-12" style="height:100px;">
													<div style="width: 50%;float:left;" align="left">
														<button type="button" class="btn btn-primary ml-2 dashboard-button prev-btn" data-prev="financial">Previous</button>
													</div>
													<div style="width: 50%;float:left;" align="right">
														<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Done</button>
													</div>
												</div>
												</form>
											</div>

										</div>
									</section>

									<section class="declaration">

										<div class="w3-container w3-teal row">
											<div class="col-sm-12">
												<h3>Declaration</h3>
												<div style="padding: 15px;"></div>

												<form class="form_submit" action="javascript:;" data-next="uploads" data-current="declaration">
												<div class="w3-container main_side col-sm-12"  align="left">
													

													<div class="form-group f_declaration f_check">
														<label>
										                    <input type="checkbox" class="check_decl" name="declaration" value="subject" id="declaration" :checked="(declaration*1)?true:false"> 
										                    <span><span><b style="color:;">Declaration:</b> Confirmation: All information I enter in this form is vaild and accurate.During my stay in China, I shall: abide by laws and regulations of the People's Republic of China; respect the customs and practices of the Chinese people; keep out of China's internal affairs; not participate in any legally or morally objectionable activities.<span class="label__required">*</span></span> </span>
									                  	</label>

													</div>
													<span class="required_declaration">First accept the declaration.</span>
													
												</div>

												
												<div class="w3-container main_side col-sm-12" style="height:100px;">
													<div style="width: 50%;float:left;" align="left">
														<button type="button" class="btn btn-primary ml-2 dashboard-button prev-btn" data-prev="mailing">Previous</button>
													</div>
													<div style="width: 50%;float:left;" align="right">
														<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Next</button>
													</div>
												</div>
												</form>
											</div>
										</div>
									</section>

									<section class="uploads">

										<div class="w3-container w3-teal row">
											<div class="col-sm-12">
												<h3>Uploade Documents</h3>
												<div style="padding: 15px;"></div>

												<h5>Notice</h5>
												<span style=" text-align: justify;">
													<p class="radio_text">1. To avoid delays in admission, please upload each document according to the description in the left column.</p>
													<p class="radio_text">2. Please make sure the scanned or photographied documents are clearly readable and can be printed.</p>
													<p class="radio_text">3. Please upload materials in the following formats: MS-Word (.doc or docx), Adobe PDF (.pdf) documents, image files (.png, .jpg). Each file cannot exceed 8MB (megabytes).</p>
												</span>
												
											
												<form class="upload-documents-form" data-current="uploads" data-next="submit">
												<div class="w3-container main_side col-sm-12"  align="left">
													
												
													{{csrf_field()}}
													<input type="hidden" value="uploads" name="type">
													<input type="hidden" value="{{$data->university->id}}" name="university_id">
													<input type="hidden" value="{{$data->id}}" name="course_id">

													<div class="row" style="margin:20px 0px;"> 
														<div class="col-sm-8">
															<h5><span style="color: red;">*</span>Certificate/Diploma of highest education </h5>
															<div class="input-container">
																<button class="browse-btn image-placeholder" type="button" data-input="f-hidden-highest_education" data-preview="f-holder-highest_education">
																	Browse Files <i class="fa fa-upload"></i>
																</button>
																<input class="file-info" readonly="" :value="(uploads.highest_education)? uploads.highest_education : 'Upload File'">
															</div>
															<span class="error-block" v-if="errors.highest_education" v-for="error in errors.highest_education" v-text="error"></span>
														</div>

				                                    	<div class="form-group col-sm-4">
							                                <div class="image-placeholder" data-input="f-hidden-highest_education" data-preview="f-holder-highest_education" style="padding: 0px;">
							              						<img :src="(uploads.highest_education=='')?'{{asset('placeholder.jpg')}}':uploads.highest_education" id="f-holder-highest_education" alt="university page" class="img-responsive img-selection img-thumbnail" style="max-height: 100%;max-width:100%;">
							                                </div>
							                                <input class="change-image" type="hidden" name="highest_education" id="f-hidden-highest_education" :value="(uploads.highest_education!==null)? uploads.highest_education :null">
							                            </div>
													</div>


													<div class="row" style="margin:20px 0px;"> 
														<div class="col-sm-8">
															<h5>Medical Report of student</h5>
															<p class="p-bordered">(optional)</p>
															<div class="input-container">
																<button class="browse-btn image-placeholder" type="button" data-input="f-hidden-medical_report" data-preview="f-holder-medical_report">
																	Browse Files <i class="fa fa-upload"></i>
																</button>
																<input class="file-info" readonly="" :value="(uploads.medical_report)? uploads.medical_report : 'Upload File'">
															</div>
															<span class="error-block" v-if="errors.medical_report" v-for="error in errors.medical_report" v-text="error"></span>
														</div>

				                                    	<div class="form-group col-sm-4">
							                                <div class="image-placeholder" data-input="f-hidden-medical_report" data-preview="f-holder-medical_report" style="padding: 0px;">
							              						<img :src="(uploads.medical_report=='')?'{{asset('placeholder.jpg')}}':uploads.medical_report" id="f-holder-medical_report" alt="medical report" class="img-responsive img-selection img-thumbnail" style="max-height: 100%;max-width:100%;">
							                                </div>
							                                <input class="change-image" type="hidden" name="medical_report" id="f-hidden-medical_report" :value="(uploads.medical_report!==null)? uploads.medical_report :null">
							                            </div>
													</div>

													<div class="row" style="margin:20px 0px;"> 
														<div class="col-sm-8">
															<h5>Photocopy of valid passport</h5>
															<p class="p-bordered">With name, passport number &amp; expiration date, and photo included</p>
															<div class="input-container">
																<button class="browse-btn image-placeholder" type="button" data-input="f-hidden-passport" data-preview="f-holder-passport">
																	Browse Files <i class="fa fa-upload"></i>
																</button>
																<input class="file-info" readonly="" :value="(uploads.passport!==null)? uploads.passport : 'Upload File'">
															</div>
															<span class="error-block" v-if="errors.passport" v-for="error in errors.passport" v-text="error"></span>
														</div>

				                                    	<div class="form-group col-sm-4">
							                                <div class="image-placeholder" data-input="f-hidden-passport" data-preview="f-holder-passport" style="padding: 0px;">
							              						<img :src="(uploads.passport)?uploads.passport:'{{asset('placeholder.jpg')}}'" alt="passport report" id="f-holder-passport" class="img-responsive img-selection img-thumbnail" style="max-height: 100%;max-width:100%;">
							                                </div>
							                                <input class="change-image" type="hidden" name="passport" id="f-hidden-passport" :value="(uploads.passport!==null)? uploads.passport :null">
							                            </div>
													</div>

													
													<div class="row" style="margin: 20px 0px;" v-for="(other,key) in uploads.other">
														<div class="col-sm-8">
															<h5 style="display: inline;">Other</h5>
															<div class="textbox btns" style="padding: 0px;display: inline;">
																<button type="button" class="btn-other add-others" v-if="key==0"><i class="fa fa-plus"></i></button>
																<button type="button" class="btn-other remove-others" v-if="key!==0" :data-key="key"><i class="fa fa-trash"></i></button>
															</div>
															<div class="input-container">
																<button class="browse-btn image-placeholder" type="button" :data-input="'f-hidden-other'+key" :data-preview="'f-holder-other'+key">
																	Browse Files <i class="fa fa-upload"></i>
																</button>
																<input class="file-info" readonly="" :value="(uploads.other[key] && uploads.other[key]!==null)? uploads.other[key] : 'Upload File'">
															</div>
														</div>

				                                    	<div class="form-group col-sm-4">
							                                <div class="image-placeholder" :data-input="'f-hidden-other'+key" :data-preview="'f-holder-other'+key" style="padding: 0px;" >
							              						<img :src="(uploads.other[key])?uploads.other[key]:'{{asset('placeholder.jpg')}}'" :id="'f-holder-other'+key" alt="university page" class="img-responsive img-selection img-thumbnail" style="max-height: 100%;max-width:100%;;">
							                                </div>
							                                <input class="change-image" type="hidden" :id="'f-hidden-other'+key" name="other[]" :value="(uploads.other[key]!==null)? uploads.other[key] :null">
							                            </div>
						                            </div> 

													<div class="w3-container main_side col-sm-12" style="height:100px;">
														<div style="width: 50%;float:left;" align="left">
															<button type="button" class="btn btn-primary ml-2 dashboard-button prev-btn" data-prev="declaration">Previous</button>
														</div>
														<div style="width: 50%;float:left;" align="right">
															<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Done</button>
														</div>
													</div>

												</div>
												</form>
											</div>
										</div>
									</section>

						
									<section class="submit">
										<div class="w3-container w3-teal row">

											<h3>Compeletion</h3>
											<div style="padding: 15px;"></div>

											<form class="form_submit" action="javascript:;" data-next="completed" data-current="submit">
											<div class="w3-container main_side col-sm-12"  align="left">
												
												<h2 class="appInfoH2 m_b10">Note</h2>
												<span style=" text-align: justify;">
													<p class="radio_text">You cannot submit the application before you complete the steps below:</p>
												</span>

												<div class="appSubText ">
													<table class="m_t20">
														<tbody>
															<tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 1</h2>
																	<span class="data_tab">Personal Information</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.pi==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.pi==0" data-prev="personal_info">Continue &gt;&gt;</a></td>
															</tr>

															<tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 2</h2>
																	<span class="data_tab">Educational Background</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.eb==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.eb==0" data-prev="educational_background">Continue  &gt;&gt;</a></td>
															</tr>

															<tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 3</h2>
																	<span class="data_tab">Language Qualification</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.lq==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.lq==0" data-prev="language_qual">Continue  &gt;&gt;</a></td>
															</tr>

															{{-- <tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 4</h2>
																	<span class="data_tab">Reason To Choose</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.rtc==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.rtc==0" data-prev="reason_to_choose">Continue  &gt;&gt;</a></td>
															</tr>

															<tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 5</h2>
																	<span class="data_tab">Family Members</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.fm==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.fm==0" data-prev="family_mem">Continue  &gt;&gt;</a></td>
															</tr> --}}

{{--															<tr>--}}
{{--																<td>--}}
{{--																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 4</h2>--}}
{{--																	<span class="data_tab">Financial Support</span>--}}
{{--																</td>--}}
{{--																<td style="padding-top:25px;"><span v-if="status.fs==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>--}}
{{--																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.fs==0" data-prev="financial">Continue  &gt;&gt;</a></td>--}}
{{--															</tr>--}}

															<tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 4</h2>
																	<span class="data_tab">Mailing Address</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.ma==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.ma==0" data-prev="mailing">Continue  &gt;&gt;</a></td>
															</tr>

{{--															<tr>--}}
{{--																<td>--}}
{{--																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 6</h2>--}}
{{--																	<span class="data_tab">Declaration</span>--}}
{{--																</td>--}}
{{--																<td style="padding-top:25px;"><span v-if="status.dec==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>--}}
{{--																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.dec==0" data-prev="declaration">Continue  &gt;&gt;</a></td>--}}
{{--															</tr>--}}

															<tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 5</h2>
																	<span class="data_tab">Uploads Documents</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.ud==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.ud==0" data-prev="uploads">Continue  &gt;&gt;</a></td>
															</tr>

															{{-- <tr>
																<td>
																	<h2 style="font-size: 17px;margin-left: 0px;text-decoration: underline;" class="appInfoH2 m_b10">Step 10</h2>
																	<span class="data_tab">Payment</span>
																</td>
																<td style="padding-top:25px;"><span v-if="status.pay==0">Incomplete</span><span v-else style="color:green;">Compeleted</span></td>
																<td style="padding-top:25px;"><a class="bbtttn" style="cursor:pointer;" v-if="status.pay==0" data-prev="payment">Continue  &gt;&gt;</a></td>
															</tr> --}}
															
														</tbody>
													</table>
												</div>
												<div class="clearfix"></div>
												
											</div>

											
											<div class="w3-container main_side col-sm-12" style="height:100px;">
												<div style="width: 50%;float:left;" align="left">
													<button type="button" class="btn btn-primary ml-2 dashboard-button prev-btn" data-prev="payment">Previous</button>
												</div>
												<div style="width: 50%;float:left;" align="left">
													<button type="submit" class="btn btn-primary ml-2 dashboard-button next-btn">Done</button>
												</div>
											</div>
											</form>


										</div>
									</section>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@section('customScripts')
	<script type="text/javascript" src="{{asset('vendor/laravel-filemanager/js/lfm.js')}}"></script>
	<script>
		var application_form = new Vue({

            el: '#application_form',
            data: {
            	personal_info:{
            		first_name:'',
            		last_name:'',
            		// chinese_name:'',
            		gender:'',
            		dob:'',
            		nationality:'',
            		passport:'',
            		valid_until:'',
            		marital_status:'',
            		religion:'',
            		previous_education:'',
            		field_of_study:'',
            		p_address:'',
            		p_phone:'',
            		c_address:'',
            		c_phone:'',
            	},
            	edu:[],
            	edu_single:{
            		school_name: '',
            		field_of_study: '',
            		diploma_received: '',
            		date_of_started: '',
            		date_of_graduation: '',
            	},
            	qual:{
            		learned_chinese: '',
            		how_long : '',
            		hsk_level : '',
            		is_english :'',
            		native_language :'',
            	},
            	reason_to_choose: '',
            	family_mem:[],
            	family_single:{relationship:'', name:'', occupation:'', phone:''},
            	financial: {
            		source_of_financial:'',
            		financial_guarantor:'',
            		relationship :'',
            		occupation:'',
            		address:'',
            		tel:'',
            		phone:'',
            		email:'',
            	},
            	mailing:{
            		name:'',
            		tel:'',
            		phone:'',
            		building:'',
            		street:'',
            		city:'',
            		country:'',
            		postcode:'',
            	},
            	declaration:0,
            	uploads:{
            		highest_education:'',
            		medical_report:'',
            		passport:'',
            		other:[''],
            	},
            	payment:1,

            	status:{
            		pi:0,
            		eb:0,
            		lq:0,
            		rtc:1,
            		fm:1,
            		fs:0,
            		ma:0,
            		dec:0,
            		ud:0,
            		pay:1,
            	},
            	countries:{},
            	errors:{},
            },
            created(){

            	this.countries = {!! pluckCountry() !!};
            	@if(isset($app->personal_information) && $app->personal_information !== null)
        			this.personal_info = JSON.parse('{!! $app->personal_information !!}');
        			this.status.pi = 1;
            	@endif
            	@if(isset($app->educational_background) && $app->educational_background !== null)
        			this.edu = JSON.parse('{!! $app->educational_background !!}');
        			this.status.eb = 1;
            	@endif
            	@if(isset($app->language_qualification) && $app->language_qualification !== null)
        			this.qual = JSON.parse('{!! $app->language_qualification !!}');
        			this.status.lq = 1;
            	@endif
            	@if(isset($app->reasons_to_choose) && $app->reasons_to_choose !== null)
        			// this.reason_to_choose = '{{ ($app->reasons_to_choose)??'' }}';
        			// this.status.rtc = 1;
            	@endif
            	@if(isset($app->family) && $app->family !== null)
        			// this.family_mem = JSON.parse('{!! $app->family !!}');
        			// this.status.fm = 1;
            	@endif
            	@if(isset($app->financial_support) && $app->financial_support !== null)
        			this.financial = JSON.parse('{!! $app->financial_support !!}');
        			this.status.fs = 1;
            	@endif
            	@if(isset($app->mailling_address) && $app->mailling_address !== null)
        			this.mailing = JSON.parse('{!! $app->mailling_address !!}');
        			this.status.ma = 1;
            	@endif
            	@if($current == 1)
            		@if(isset($app->declaration))
	        			this.declaration = '{!! $app->declaration !!}'*1;
        				this.status.dec = '{!! $app->declaration !!}'*1;
	            	@endif
            	@endif
            	@if(isset($app->uploads) && $app->uploads !== null)
        			this.uploads = JSON.parse('{!! $app->uploads !!}');
        			this.status.ud = 1;
            	@endif
            	@if(isset($app->application_fee) && $app->application_fee !== null)
        			// this.payment = '{!! $app->application_fee !!}'*1;
        			// this.status.pay = this.payment;
            	@endif
        		$(document).ready(function(){
        			@if(isset($_GET['check']))
        				setTimeout(function(){
    						$('div[data-tab="{{$_GET['check']}}"]').trigger('click');
	        			},1000);
        			@endif
        		});
            },
            methods: {
            	removeEdu(key){
     		 		this.edu.splice(key, 1);
            	},
            	removeFem(key){
     		 		this.family_mem.splice(key, 1);
            	},
            	nextPaid(){
            		$(document).ready(function(){
            			$('.submit-final').trigger('click');
            		})
            	},
            },
            mounted(){
              var _this = this;
              $(document).ready(function(){

    			$('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});

              	$('.check_main').on('click', function(){
              		$('.check_main').removeClass('active');
              		$(this).addClass('active');
              		var data = $(this).attr('data-tab');
              		$('.main_tabs section').fadeOut(100);
              		$('.'+data).delay(100).fadeIn(100);
              	})
              	$('.tablinks').on('click', function(){
              		$('.tablinks').attr('id', '');
              		$(this).attr('id', 'defaultOpen');
              		$('.tablinks').removeClass('active');
              		$('.tabcontent').removeClass('active');
              		$('.tabcontent').removeClass('show');
              		$(this).addClass('active');
              		// $(this).addClass('show');
              		var data = $(this).attr('data-tab');
              		$('.tabcontent').fadeOut(100);
              		$('#'+data).fadeIn(300);
              		$('#'+data).addClass('active');
              		$('#'+data).addClass('show');
              	})
                $('.change_select').on('focusout', function(){
                	var val = $(this).val();
                	var name = $(this).attr('data-name');
                	if(name == 'gender'){
                		_this.personal_info.gender = val;
                	}else if(name == 'marital'){
                		_this.personal_info.marital_status = val;
                	}else if(name == 'dob'){
                		_this.personal_info.dob = val;
                	}else if(name == 'valid'){
                		_this.personal_info.valid_until = val;
                	}else if(name == 'hsk'){
                		_this.qual.hsk_level = val;
                	}else if(name == 'learned_chinese'){
                		_this.qual.learned_chinese = val;
                	}else if(name == 'is_english'){
                		_this.qual.is_english = val;
                	}else if(name == 'date_of_started'){
                		_this.edu_single.date_of_started = val;
                	}else if(name == 'date_of_graduation'){
                		_this.edu_single.date_of_graduation = val;
                	}else if(name == 'source_of_financial'){
                		_this.financial.source_of_financial = val;
                	}else if(name == 'nationality'){
                		_this.personal_info.nationality = val;
                	}
                });
                $('.check_decl').on('change', function(){
                	if($(this).is(':checked')){
                		_this.declaration = 1;
                	}else{
                		_this.declaration = 0;
                	}
                });
                $('.add-edu').on('click', function( key, value ){
                	if(_this.edu_single.school_name == '' || _this.edu_single.field_of_study == '' || _this.edu_single.diploma_received == '' || _this.edu_single.date_of_started == '' || _this.edu_single.date_of_graduation == ''){
                		$('.edu_status').fadeIn(200).delay(1000).fadeOut(100);
                		return false;
                	}
                	_this.edu.push(_this.edu_single);
                	_this.edu_single = {school_name: '',field_of_study: '',diploma_received: '',date_of_started: '',date_of_graduation: ''};
                });
                $('.educational_background').on('click','.remove-edu', function(){
                	var id = $(this).data('id');
                	_this.edu.splice(id, 1);
                });
                $('.add-mem').on('click', function(){
                	if(_this.family_single.relationship == '' || _this.family_single.name == '' || _this.family_single.occupation == '' || _this.family_single.phone == ''){
                		$('.fem_status').fadeIn(200).delay(1000).fadeOut(100);
                		return false;
                	}
                	_this.family_mem.push(_this.family_single);
                	_this.family_single = {relationship:'', name:'', occupation:'', phone:''};
                });
                $('.family_mem').on('click','.remove-mem', function(){
                	var id = $(this).data('id');
                	_this.family_mem.splice(id, 1);
                });
                
              	$(document).on('keyup change focusout', 'input, select, textarea',function(){
              		var name = $(this).attr('name');
              		if(_this.errors[name]){
              			_this.errors[name] = '';
              		}
              	})
              	$(document).on('click', '.prev-btn , .bbtttn', function(){
              		var prev = $(this).attr('data-prev');
              		$('div[data-tab="'+prev+'"]').trigger('click');
              	});
              	$(document).on('submit', '.form_submit', function(e){
              		e.preventDefault();
              		var url = $(this).attr('action');
              		var current = $(this).attr('data-current');
              		var next = $(this).attr('data-next');
              		if(current=='personal_info'){
              			var data = _this.personal_info;
              		}else if(current == 'educational_background'){
              			var data = _this.edu;
              		}else if(current == 'language_qual'){
              			var data = _this.qual;
              		}
					// else if(current == 'reason_to_choose'){
					// 	var data = {'reason_to_choose':_this.reason_to_choose};
					// }else if(current == 'family_mem'){
					// 	var data = _this.family_mem;
					// }else if(current == 'financial'){
					// 	var data = _this.financial;
					// }
              		else if(current == 'mailing'){
              			var data = _this.mailing;
              		}else if(current == 'declaration'){
              			var data = _this.declaration;
              			if(_this.declaration == 0){
              				$('.required_declaration').fadeIn(100).delay(1000).fadeOut(100);
              				return false;
              			}
              		}else if(current == 'payment'){
              			var data = _this.payment;
              		}else if(current == 'submit'){
              			var data = _this.status;
              			$('.next-btn').text('Submitting...')
              			$('.next-btn').attr('disabled', true);
              			setTimeout(function(){
              				$('.next-btn').text('Done');
              				$('.next-btn').removeAttr('disabled');
              			}, 5200);
              		}
              		axios
              		.post('{{url("apply-validation")}}', {data:data, _token:'{{csrf_token()}}', 'type':current, 'course_id':'{{$data->id}}', 'university_id':'{{$data->university->id}}'})
              		.then(response=>{
              			console.log(response);
              			if(response.data.errors){
              				_this.errors = response.data.errors;
              				if(current == 'educational_background'){
                				$('.edu_status').fadeIn(200).delay(1000).fadeOut(100);
              				}
              				if(current == 'financial'){
                				$('.fem_status').fadeIn(200).delay(1000).fadeOut(100);
              				}
              			}else if(response.data == 'redirect'){
              				window.location.href = '{{url("/")}}';
              			}else{
              				_this.errors = {};
              				$('div[data-tab="'+current+'"].check_main').find('.fa-thumbs-up').fadeIn(200);
              				if(current=='submit'){
              					window.location.href = "{{url('dashboard#application')}}";
              				}
              				$('div[data-tab="'+next+'"]').trigger('click');
              				if(current=='personal_info'){
              					_this.status.pi = 1;
		              		}else if(current == 'educational_background'){
		              			_this.status.eb = 1;
		              		}else if(current == 'language_qual'){
		              			_this.status.lq = 1;
		              		}
              				// else if(current == 'reason_to_choose'){
		              		// 	_this.status.rtc = 1;
		              		// }else if(current == 'family_mem'){
		              		// 	_this.status.fm = 1;
		              		// }else if(current == 'financial'){
		              		// 	_this.status.fs = 1;
		              		// }
              				else if(current == 'mailing'){
		              			_this.status.ma = 1;
		              		}else if(current == 'declaration'){
		              			_this.status.dec = 1;
		              		}else if(current == 'payment'){
		              			_this.status.pay = 1;
		              		}
              			}
              			$('.next-btn').text('Done');
              			$('.next-btn').removeAttr('disabled');

              		})
              		.catch(error=>{
              			console.log(error);
              		})
              	});

              	$(document).on('click', '.browse-btn', function(){

              		$(this).parent().find('input[type="file"]').trigger('click');
              	});
              	$(document).on('change', '.input-file',function(e){
              		var name = e.target.files[0].name;
              		$(this).parent().find('.file-info').text(name);
              	})
              	$(document).on('change', '.change-image',function(){
              		var tt = $(this).val();
              		if($(this).attr('name') == 'highest_education'){
              			_this.uploads.highest_education = tt;
              		}else if($(this).attr('name') == 'medical_report'){
              			_this.uploads.medical_report = tt;
              		}else if($(this).attr('name') == 'passport'){
              			_this.uploads.passport= tt;
              		}
              		$(this).parent().parent().find('.file-info').val(tt);
              	})
              	$(document).on('submit', '.upload-documents-form', function(e){
              		e.preventDefault();
              		var __this = $(this);
              		$(this).find('.right_btns').attr('disabled', true);
              		$(this).find('.right_btns').text('Please Wait');
              		setTimeout(function(){
              			__this.find('.right_btns').attr('disabled', false);
              			__this.find('.right_btns').text('Next');
              		},10000)
              		var data = $(this).serialize();
              		axios
              		.post('{{url('apply-validation')}}', data)
              		.then(response => {
              			if(response.data.errors){
              				_this.errors = response.data.errors;
              			}else{
              				_this.errors = {};
              				// _this.uploads = data;
              				$(this).find('.right_btns').attr('disabled', false);
              				$(this).find('.right_btns').text('Next');
		              		_this.status.ud = 1;
              				$('div[data-tab="submit"]').trigger('click');
              				$('div[data-tab="uploads"].check_main').find('.fa-thumbs-up').fadeIn(200);
              			}
              		});
              	});
     			$(document).on('click', '.add-others', function(){
              		_this.uploads.other.push('');
              		setTimeout(function(){
	    				$('.image-placeholder').filemanager('image',{prefix:"{{url('/filemanager')}}"});
              		},300);
              		// console.log(_this.uploads);
              	});
              	$(document).on('click', '.remove-others', function(){
              		var key = $(this).attr('data-key');
              		_this.uploads.other.splice(key, 1);
              	})

              	$(document).on('click', 'input[type="radio"]', function(){
	            	if($(this).is(':checked')){
	            		$('.payment_border').css('border', '2px solid #dcdada');
	            		$('.payment_border').css('border-bottom', '3px #30b0c9 solid');
	            		$(this).parents('.payment_border').css('border', '3px #30b0c9 solid');
	            	}
	            });
	            $(document).on('click', '.header__small__menu--open', function(){
	            	if(!$('body').hasClass('menu-active')){$('body').addClass('menu-active');}
	            });
	            $(document).on('click', '.header__small__menu--close', function(){
	            	if($('body').hasClass('menu-active')){$('body').removeClass('menu-active');}
	            });



              });
               
            },

        });
	</script>

@endsection