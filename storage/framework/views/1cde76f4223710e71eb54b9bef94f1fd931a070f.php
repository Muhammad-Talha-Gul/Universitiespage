<?php $__env->startSection('title', 'Application Form | '.$data->name.' | '.$data->university->name); ?>

<?php $__env->startSection('customStyles'); ?>
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
		background: #00829b !important;
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
		padding: 20px 20px;
		margin: 0 auto;
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

	.datepicker--cell {
		color: #000;
	}

	.datepicker--cell:hover {
		background: #0B6D76 !important;
		color: #fff !important;
	}

	.datepicker--cell.active {
		background: #0B6D76 !important;
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

	@media  only screen and (max-width : 1024px) {
		#application_form {
			margin-top: 100px;
		}
	}

	@media  only screen and (max-device-width : 1200px) {
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

	@media  only screen and (min-device-width : 768px) and (max-device-width : 1024px) {
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

	@media  screen and (min-width: 600px) {
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

	.modal-footer {
		justify-content: center !important;
		border-top: none;
	}

	.apply-online-main {
		max-width: 600px;
		margin: 50px auto;
	}
	.apply-heading{
		text-align: center;
		text-transform: uppercase;
		color: #0B6D76;
	}
	.apply-input{
		min-height: 40px !important;
	}
	.apply-online-section{
		background: #f8f9fa;
    padding: 50px 0px;
	}

	input[type="file"]::file-selector-button {
		width: auto !important;
		padding-left: 10px;
		padding-right: 10px;
	}
	.apply-inpu-label{
		font-size: 14px;
		font-weight: 400;
		margin-bottom: 2px;
	}
	.select2-container--default .select2-selection--single {
		height: 40px !important;
	}

	.education-image-input-group{
		position: relative;
	}
	.btn.delete-input-btn {
        position: absolute;
		top: 15px;
		right: 3px;
		padding: 1px 4px;
		font-size: 12px;
		/* background: red !important; */
		border: navajowhite;
		border-radius: 50%;
	}
	.more-image-span{
		padding: 5px 8px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
    position: absolute;
    left: 50px;
    top: -10px;
    /* width: 112px !important; */
    font-size: 12px;
    font-weight: 700;
    color: #333;
    text-transform: capitalize;
	display: none;
	}
	.add-more-button{
		position: relative;
	}
	.add-more-button:hover .more-image-span{
		display: block;
	}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session('success')); ?>

    </div>
<?php endif; ?>
<section class="apply-online-section">
	<div class="w3-container">
		<div class="apply-online-main w3-teal">
			<h3 class=" mt-2 mb-3 apply-heading">Online Apply</h3>
			<form action="<?php echo e(route('apply-online')); ?>" method="post" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>

				<div class="modal-body p-0">
					<div class="row input m-0">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
							<label for="" class="apply-inpu-label">Full Name</label>
							<input type="text" name="student_name" class="form-control apply-input" placeholder="Enter Your Name">
							<!-- @error('name')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Enter Email</label>
							<input type="email" name="student_email" class="form-control apply-input" placeholder="Enter Your Email">
							<!-- @error('email')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
					</div>
					<div class="row input m-0">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Enter Phone Number</label>
							<input type="number" name="student_phone_number" class="form-control apply-input" placeholder="Enter Your Phone Number " required>
							<!-- @error('phone_number')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Enter Last Education</label>
							<input type="text" name="student_last_education" class="form-control apply-input" placeholder="Enter Your Last Education" required>
							<!-- @error('last_education')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
					</div>
					<div class="row input m-0">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Select Country</label>
							<select name="student_country" class="form-control apply-input country" aria-label="Default select example" onchange="loadStates()" required>
								<option selected>Select Country</option>
							</select>
							<!-- @error('country')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Select State</label>
							<select class="form-control apply-input state" aria-label="Default select example" onchange="loadCities()" id='state' name='state' required>
								<option selected>Select State</option>
							</select>
							<input type="hidden" id="hidden_country_name" name="selected_country_name">
							<!-- @error('state')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
					</div>
					<div class="row input m-0 mt-1">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Select City</label>
							<select class="form-control apply-input city" aria-label="Default select example" id='city' name='city' required>
								<option selected>Select City</option>
							</select>
							<input type="hidden" id="hidden_state_name" name="selected_state_name">
							<!-- @error('city')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
							<label for="" class="apply-inpu-label">Apply For</label>
							<input type="text" name="student_apply_for" class="form-control apply-input" placeholder="Apply For" required>
							<!-- @error('apply_for')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						
					</div>
					<div class="row input m-0 mt-1">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
							<label for="" class="apply-inpu-label">Upload Passport image</label>
							<input type="file" name="student_passport_image" class="form-control apply-input apply-file-input" placeholder="Upload Passport image" style="padding-top:0px !important; padding-left:0px !important;" required>
							<!-- @error('passport_image')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3">
						<label for="" class="apply-inpu-label">Upload Last Education image</label>
							<input type="file" name="student_last_education_images[]" class="form-control apply-input apply-file-input" placeholder="Upload Last Education image" style="padding-top:0px !important; padding-left:0px !important;" required>
							<!-- @error('last_education_image')
								<div class="invalid-feedback"><?php echo e($message); ?></div>
							@enderror  -->
						</div>
						<div class="col-sm-12">
						<div class="row" id="education-images-container">
						
						</div>
						<button type="button" id="add-more-images-btn" class="btn btn-primary add-more-button">
							<i class="fa fa-plus"></i> 
							<span class="more-image-span">add more education images</span>
						</button>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-default pull-left">Submit</button>
					<!-- <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button> -->
				</div>
			</form>
		</div>
	</div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customScripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('vendor/laravel-filemanager/js/lfm.js')); ?>"></script>
<script>
    function FormSubmit(input){
        $(':input').removeClass('has-error');
        $('.error-span').remove();
        axios.post('/free-consulation',$('#ratingForm').serialize()).then(function (response) {
            if (response.data.status == 'success'){
                swal({
                    title: response.data.msg,
                    icon: "success",
                }).then(data =>{
                    window.location.reload()
                });
            }else if(response.data.status == 'error'){
                $(input).attr('disabled',false);
                $('.alert-danger').text(response.data.msg);
                $('.alert-danger').show();
            }
        }).catch(function (error){
            $(input).attr('disabled',false);
            $.each(error.response.data.errors, function (k, v) {
                $('input[name="' + k + '"]').addClass("has-error");
                $('input[name="' + k + '"]').after("<span class='error-span'>" + v[0] + "</span>");
            });
        });
    }
        var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}
  var countrySelect = document.querySelector('.country'),
    stateSelect = document.querySelector('.state'),
    citySelect = document.querySelector('.city')
	function loadCountries() {
		let apiEndPoint = config.cUrl;
		// Create a search input element
		const searchInput = document.createElement('input');
		searchInput.setAttribute('type', 'text');
		searchInput.setAttribute('placeholder', 'Search country...');
		searchInput.classList.add('hidden');
		searchInput.classList.add('form-control');
		searchInput.addEventListener('input', filterCountries); // Attach event listener
		// Append the search input before the country select element
		document.querySelector('.country').parentNode.insertBefore(searchInput, document.querySelector('.country'));

		// Fetch countries from API
		fetch(apiEndPoint, {headers: {"X-CSCAPI-KEY": config.ckey}})
			.then(response => response.json())
			.then(data => {
				// console.log(data);
				const countrySelect = document.querySelector('.country');

				data.forEach(country => {
					const option = document.createElement('option');
					option.value = country.iso2;
					option.textContent = country.name;
					countrySelect.appendChild(option);
				});
				// Enable the state and city selects
				stateSelect.disabled = true;
				citySelect.disabled = true;
				stateSelect.style.pointerEvents = 'none';
				citySelect.style.pointerEvents = 'none';

				// Initialize Select2 after appending options
				$('.country').select2();
				
			})
			.catch(error => console.error('Error loading countries:', error));
	}
	// Function to filter countries based on search input
	function filterCountries() {
		const searchText = this.value.toLowerCase();
		const options = document.querySelectorAll('.country option');

		options.forEach(option => {
			const optionText = option.textContent.toLowerCase();
			const showOption = optionText.includes(searchText);
			option.style.display = showOption ? 'block' : 'none';
		});
	}
	function loadStates() {
		stateSelect.disabled = false;
		citySelect.disabled = true;
		stateSelect.style.pointerEvents = 'auto';
		citySelect.style.pointerEvents = 'none';

		const selectedCountryCode = countrySelect.value;
		stateSelect.innerHTML = ''; // Clear existing options

		// Initialize Select2 on the state select element
		$(stateSelect).empty().select2({
			placeholder: 'Search or select state...',
			allowClear: true // Add an option to clear the selection
		});

		// Fetch states from the API
		fetch(`${config.cUrl}/${selectedCountryCode}/states`, { headers: { "X-CSCAPI-KEY": config.ckey } })
			.then(response => response.json())
			.then(data => {
				// Map states data to Select2 compatible format
				const statesData = data.map(state => ({ id: state.iso2, text: state.name }));

				// Add the states data to the Select2 dropdown
				$(stateSelect).select2({
					data: statesData
				});
			})
			.catch(error => console.error('Error loading states:', error));
	}
	function loadCities() {
		citySelect.disabled = false;
		citySelect.style.pointerEvents = 'auto';

		const selectedCountryCode = countrySelect.value;
		const selectedStateCode = stateSelect.value;
		// console.log(selectedCountryCode, selectedStateCode);

		citySelect.innerHTML = ''; // Clear existing options

		// Initialize Select2 on the city select element
		$(citySelect).empty().select2({
			placeholder: 'Search or select city...',
			allowClear: true // Add an option to clear the selection
		});

		// Fetch cities from the API
		fetch(`${config.cUrl}/${selectedCountryCode}/states/${selectedStateCode}/cities`, { headers: { "X-CSCAPI-KEY": config.ckey } })
			.then(response => response.json())
			.then(data => {
				// Map cities data to Select2 compatible format
				const citiesData = data.map(city => ({ id: city.name, text: city.name }));

				// Add the cities data to the Select2 dropdown
				$(citySelect).select2({
					data: citiesData
				});
			})
			.catch(error => console.error('Error loading cities:', error));
	}
	window.onload = loadCountries
</script>
<script>
	$('.country').change(function() {
        // Get the selected option's text
        var selectedOptionText = $(this).find('option:selected').text();
		$('#hidden_country_name').val(selectedOptionText);
    });

	$('.state').change(function() {
        // Get the selected option's text
        var selectedOptionText = $(this).find('option:selected').text();
        
        // Set the value of the hidden input field to the selected option's text
        $('#hidden_state_name').val(selectedOptionText);
    });

	$(document).ready(function() {
		setTimeout(function() {
			$('.alert-success').fadeOut('slow');
		}, 5000); 

		

		$('#onlineConsultantsTable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": "/api/getOnlineConsultants?access_key=x4jn9dwifn5kgjnd3nsdjcnxninzi1zwf2sd", // Your API endpoint
                    "type": "GET"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "created_at" },
                    { "data": "application_type" },
                    { "data": "student_name" },
                    { "data": "student_email" },
                    { "data": "student_phone_number" },
                    { "data": "student_last_education" },
                    { "data": "student_country" },
                    { "data": "student_state" },
                    { "data": "student_city" },
                    { "data": "student_apply_for" },
                    { "data": "student_passport_image" },
                    { "data": "student_last_education_image" },
                    { "data": "student_assigned_employee" },
                    // Add more columns as needed
                ]
            });



    });

	var maxInputs = 4; 
var inputCount = 0; 

// document.getElementById('add-more-images-btn').addEventListener('click', function() {
//     if (inputCount < maxInputs) { // Check if the maximum limit is not reached
//         var container = document.getElementById('education-images-container');
//         var inputGroup = document.createElement('div');
//         inputGroup.className = 'col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3 education-image-input-group';
//         inputGroup.innerHTML = `
//             <label class="apply-inpu-label">Upload more education image (optional)</label>
//             <input type="file" name="student_last_education_images[]" class="form-control apply-input apply-file-input" style="padding-top:0px !important; padding-left:0px !important;">
//         `;
//         container.appendChild(inputGroup);
//         inputCount++; // Increment input count
//     } else {
//         alert("You can't add more than " + maxInputs + " images.");
//     }
// });

document.getElementById('add-more-images-btn').addEventListener('click', function() {
    if (inputCount < maxInputs) { // Check if the maximum limit is not reached
        var container = document.getElementById('education-images-container');
        var inputGroup = document.createElement('div');
        inputGroup.className = 'col-xs-12 col-sm-6 col-md-6 col-lg-6 mb-3 education-image-input-group';
        
        // Create label element
        var label = document.createElement('label');
        label.className = 'apply-inpu-label';
        label.textContent = 'Upload more education image (optional)';
        
        // Create input element
        var input = document.createElement('input');
        input.type = 'file';
        input.name = 'student_last_education_images[]';
        input.className = 'form-control apply-input apply-file-input';
        input.style = 'padding-top:0px !important; padding-left:0px !important;';
        
        // Append label and input to inputGroup
        inputGroup.appendChild(label);
        inputGroup.appendChild(input);
        
        var deleteButton = document.createElement('button');
        deleteButton.innerHTML = '<i class="fa fa-minus"></i>';
        deleteButton.className = 'btn btn-danger delete-input-btn';
        deleteButton.addEventListener('click', function() {
            container.removeChild(inputGroup);
            inputCount--;
        });
        
        // Append delete button to inputGroup
        inputGroup.appendChild(deleteButton);
        
        container.appendChild(inputGroup);
        inputCount++; // Increment input count
    } else {
        alert("You can't add more than 6 images.");
    }
});


		
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.frontend', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>