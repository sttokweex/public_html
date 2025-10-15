<?php
require(dirname(__DIR__, 1) . "/system/config.php");
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}
require(dirname(__DIR__, 1) . "/panels/header.php");
require(dirname(__DIR__, 1) . "/panels/sidebar.php");
?>

<div class="main-container" id="main-content">
  <div class="" data-web-content-id="PRIVACY_STATEMENT_NOV24">
    <article>
      <div class="col-mob-4 col-dsk-8 Articles__articles--12Q">
        <article class="Articles__article--3SO">
          <div class="Articles__content--2Mi ">
            <article>
              <style type="text/css">
                @font-face {
                  font-family: hcfontlight;
                  src: url(/library/holland_online_fonts/Cadiz-Light.ttf?siteid=1);
                }

                @font-face {
                  font-family: hcfontbook;
                  src: url(/library/holland_online_fonts/Cadiz-Book.woff) format("woff"),
                    url(/library/holland_online_fonts/Cadiz-Book.woff2) format("woff2");
                  font-weight: 350;
                  font-style: normal;
                  font-display: swap;
                }

                @font-face {
                  font-family: hcfontregular;
                  src: url(/library/holland_online_fonts/Cadiz-Regular.ttf?siteid=1);
                }

                @font-face {
                  font-family: hcfontbold;
                  src: url(/library/holland_online_fonts/Cadiz-Bold.ttf?siteid=1);
                }

                .privacy__content h1.heading {
                  font-size: 1.875rem;
                  margin-bottom: 1.5rem;
                  color: #fb258d;
                }

                .privacy__content h2.heading {
                  font-size: 1.5rem;
                  margin-bottom: 1.5rem;
                  color: #fb258d;
                }

                .privacy__content h3.heading {
                  font-size: 1.25rem;
                  color: #fb258d;
                  margin-bottom: 1.5rem;
                }

                .privacy__content p {
                  font-family: hcfontbook;
                  font-size: 1rem;
                  margin-bottom: 1.5rem;
                }

                .privacy__content p strong {
                  font-family: hcfontbold;
                }

                .privacy__content ul {
                  list-style-type: disc;
                  margin-bottom: 1.5rem;
                  font-size: 1rem;
                }

                .privacy__content li {
                  margin-bottom: 0.75rem;
                  line-height: 1.5;
                }

                .privacy__content ul ul {
                  list-style-type: circle;
                  margin-left: 0.5rem;
                }

                .privacy__content ul ul ul {
                  list-style-type: square;
                  margin-left: 0.5rem;
                }

                .privacy__content a {
                  color: #fff;
                  text-decoration: none;
                  position: relative;
                }

                .privacy__content a:after {
                  position: absolute;
                  left: 0;
                  bottom: -7px;
                  content: "";
                  height: 2px;
                  width: 100%;
                  background: linear-gradient(90deg, #ff328c, #ff914c, #ff328c) 0 0;
                  background: #fff;
                  transition: transform 0.25s ease-in;
                }

                .privacy__content a:hover:after {
                  background: linear-gradient(to right, #ff328c 5%, #ff914c 100%);
                  background: #fff;
                  transform: scaleX(1.1);
                }

                @media only screen and (min-width: 768px) {
                  .privacy__content h1.heading {
                    font-size: 2.5rem;
                  }

                  .privacy__content h2.heading {
                    font-size: 2rem;
                  }

                  .privacy__content h3.heading {
                    font-size: 1.625rem;
                  }
                }
              </style>
              <div class="privacy__content">
                <h1 class="Headings__head--2LV Headings__bold--iD3 Headings__h1--284 Headings__dark--1eH">
                  <?php echo $translations['privacy_statement_title']; ?>
                </h1>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['privacy_intro']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['privacy_applicability']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['company_info']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['privacy_update']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_origin_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_origin_description']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_processing_title']; ?>
                </h2>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['registration_verification_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_contract']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['registration_verification_description']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_name']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_email']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_address']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_phone']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_birth_date']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_gender']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_financial']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_identity']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_login']; ?></li>
                </ul>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['monitoring_database_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_obligation']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['monitoring_database_description']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_profile_changes']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_intervention']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_non_credited']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_credit_rejection']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_transactions']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_bets_wins']; ?></li>
                </ul>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['service_improvement_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['service_improvement_description']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_usage']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_online_behavior']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_device_info']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_shared_info']; ?></li>
                </ul>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['trend_analysis']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['gambling_prevention_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_obligation_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['age_verification']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['gambling_behavior_monitoring']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_gaming_behavior']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_transactions_gaming']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_play_time']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_logins']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_limits']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_measures']; ?></li>
                </ul>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['personal_interview']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_identity_interview']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_interview_details']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_interview_content']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_interview_response']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_interview_conclusions']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_intervention_measures']; ?></li>
                </ul>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['intervention_outcomes']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['aml_fraud_prevention_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_obligation']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['aml_verification']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['aml_monitoring']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['aml_actions']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['scientific_research_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['scientific_research_description']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_play_frequency']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_time']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_gaming_behavior_research']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_limits_adjustments']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_account_changes']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_bets_wins_losses']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_bonus_usage']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['data_measures_research']; ?></li>
                </ul>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['pseudonymization']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['commercial_communications_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_consent']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['commercial_communications_description']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['opt_out_settings']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['opt_out_email']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['opt_out_support']; ?></li>
                </ul>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['opt_out_processing']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['customer_service_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_obligation_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['customer_service_description']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['service_messages_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['service_messages_description']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['marketing_optimization_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['marketing_profile']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['marketing_partners']; ?>
                </p>
                <h3 class="Headings__head--2LV Headings__bold--iD3 Headings__h3--16M Headings__dark--1eH">
                  <?php echo $translations['ad_data_collection_title']; ?>
                </h3>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <strong><?php echo $translations['legal_basis_label']; ?></strong> <?php echo $translations['legal_basis_interest']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['ad_data_collection_description']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['ad_data_usage']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['automated_decision_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['automated_decision_description']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['automated_decision_review']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['minors_incapacitated_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['minors_incapacitated_description']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_retention_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_retention_description']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_protection_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_protection_description']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_subject_rights_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_subject_rights_intro']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_subject_rights_list_intro']; ?>
                </p>
                <ul>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_access']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_rectification']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_erasure']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_restriction']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_portability']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_objection']; ?></li>
                  <li class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd"><?php echo $translations['right_withdraw_consent']; ?></li>
                </ul>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_sharing_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_sharing_contractors']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_sharing_legal']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_sharing_reports']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['data_protection_non_eea_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_protection_non_eea_providers']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['data_protection_non_eea_measures']; ?>
                </p>
                <h2 class="Headings__head--2LV Headings__bold--iD3 Headings__h2--3Bv Headings__dark--1eH">
                  <?php echo $translations['contact_title']; ?>
                </h2>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['contact_info']; ?>
                </p>
                <p class="PlainText__text--1wg PlainText__medium--1_S PlainText__dark--3fd">
                  <?php echo $translations['complaint_authority']; ?>
                </p>
              </div>
            </article>
          </div>
        </article>
      </div>
    </article>
  </div>
</div>
<?php
require(dirname(__DIR__, 1) . "/panels/footer.php");
render_footer($translations);
?>