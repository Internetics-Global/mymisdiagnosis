<?php
		
$this->ionAuth = new \IonAuth\Libraries\IonAuth();
$user = $this->ionAuth->user()->row(); 

$uri = current_url(true);





	
?>	




<form method="get" action="<?= base_url()?>/search/">
<div class="homesearchbox search_box">
<div class="container">
    <div class="row">
	   
	   <div class="col-12" align="center">
		 
		  <div id="custom-search-input">
			 <div class="input-group d-flex justify-content-center">
				 
			
				 
			<input id="search" name="search" type="text" class="form-control" placeholder="Type something..." />
			<input type="image" class="autocomplete_search_button" src="./images/logo-tra.png" alt="submit"/>
			
				 
			 </div>
		  </div>
	      
	   </div>
	   
    </div>
</div>
</div>

</form>



    
   <center><div class="homepageh1"><h1><?= $title ?></h1></div></center>
	   
	<div id="post_body">


<!-- Trigger the modal with a button -->



<!-- Modal -->
<div class="row mb-2">

	<div class="col-md-8">
	
	
		<?= htmlspecialchars_decode($post_body, ENT_HTML5) ?>
		
	<div class="home_category_listing">
		
		<p><a href="/diagnosis/abdominal_aortic_aneurysm">Abdominal Aortic Aneurysm</a></p>
		<p><a href="/diagnosis/acute_cholecystitis">Acute Cholecystitis</a></p>
		<p><a href="/diagnosis/acute_lymphoblastic_leukaemia">Acute Lymphoblastic Leukaemia</a></p>
		<p><a href="/diagnosis/acute_myeloid_leukaemia">Acute Myeloid Leukaemia</a></p>
		<p><a href="/diagnosis/acute_pancreatitis">Acute Pancreatitis</a></p>
		<p><a href="/diagnosis/addison's_disease">Addison's Disease</a></p>
		<p><a href="/diagnosis/alcohol-related_liver_disease">Alcohol-related Liver Disease</a></p>
		<p><a href="/diagnosis/allergic_rhinitis">Allergic Rhinitis</a></p>
		<p><a href="/diagnosis/anal_cancer">Anal Cancer</a></p>
		<p><a href="/diagnosis/anaphylaxis">Anaphylaxis</a></p>
		<p><a href="/diagnosis/angioedema">Angioedema</a></p>
		<p><a href="/diagnosis/ankylosing_spondylitis">Ankylosing Spondylitis</a></p>
		<p><a href="/diagnosis/anorexia_nervosa">Anorexia Nervosa</a></p>
		<p><a href="/diagnosis/anxiety">Anxiety</a></p>
		<p><a href="/diagnosis/aortic_aneurysm_and_dissection">Aortic Aneurysm And Dissection</a></p>
		<p><a href="/diagnosis/appendicitis">Appendicitis</a></p>
		<p><a href="/diagnosis/arterial_thromboembolism">Arterial Thromboembolism</a></p>
		<p><a href="/diagnosis/arthritis">Arthritis</a></p>
		<p><a href="/diagnosis/asbestosis">Asbestosis</a></p>
		<p><a href="/diagnosis/asthma">Asthma</a></p>
		<p><a href="/diagnosis/atopic_eczema">Atopic Eczema</a></p>
		<p><a href="/diagnosis/attention_deficit_hyperactivity_disorder_(adhd)">Attention Deficit Hyperactivity Disorder (ADHD)</a></p>
		<p><a href="/diagnosis/autistic_spectrum_disorder_(asd)">Autistic Spectrum Disorder (ASD)</a></p>
		<p><a href="/diagnosis/bacterial_vaginosis">Bacterial Vaginosis</a></p>
		<p><a href="/diagnosis/benign_prostate_enlargement">Benign Prostate Enlargement</a></p>
		<p><a href="/diagnosis/bile_duct_cancer_(cholangiocarcinoma)">Bile Duct Cancer (cholangiocarcinoma)</a></p>
		<p><a href="/diagnosis/bipolar_disorder">Bipolar Disorder</a></p>
		<p><a href="/diagnosis/bladder_cancer">Bladder Cancer</a></p>
		<p><a href="/diagnosis/blood_poisoning_(sepsis)">Blood Poisoning (sepsis)</a></p>
		<p><a href="/diagnosis/bone_cancer">Bone Cancer</a></p>
		<p><a href="/diagnosis/bowel_cancer">Bowel Cancer</a></p>
		<p><a href="/diagnosis/bowel_polyps">Bowel Polyps</a></p>
		<p><a href="/diagnosis/brain_stem_death">Brain Stem Death</a></p>
		<p><a href="/diagnosis/brain_tumours">Brain Tumours</a></p>
		<p><a href="/diagnosis/breast_cancer">Breast Cancer</a></p>
		<p><a href="/diagnosis/breast_cancer_(female)">Breast Cancer (female)</a></p>
		<p><a href="/diagnosis/breast_cancer_(male)">Breast Cancer (male)</a></p>
		<p><a href="/diagnosis/bronchiectasis">Bronchiectasis</a></p>
		<p><a href="/diagnosis/bronchitis">Bronchitis</a></p>
		<p><a href="/diagnosis/bunion">Bunion</a></p>
		<p><a href="/diagnosis/carcinoid_syndrome_and_carcinoid_tumours">Carcinoid Syndrome And Carcinoid Tumours</a></p>
		<p><a href="/diagnosis/celiac_disease">Celiac Disease</a></p>
		<p><a href="/diagnosis/cellulitis">Cellulitis</a></p>
		<p><a href="/diagnosis/cervical_cancer">Cervical Cancer</a></p>
		<p><a href="/diagnosis/chickenpox">Chickenpox</a></p>
		<p><a href="/diagnosis/chilblains">Chilblains</a></p>
		<p><a href="/diagnosis/chlamydia">Chlamydia</a></p>
		<p><a href="/diagnosis/chronic_fatigue_syndrome">Chronic Fatigue Syndrome</a></p>
		<p><a href="/diagnosis/chronic_lymphocytic_leukaemia">Chronic Lymphocytic Leukaemia</a></p>
		<p><a href="/diagnosis/chronic_myeloid_leukaemia">Chronic Myeloid Leukaemia</a></p>
		<p><a href="/diagnosis/chronic_obstructive_pulmonary_disease">Chronic Obstructive Pulmonary Disease</a></p>
		<p><a href="/diagnosis/chronic_pancreatitis">Chronic Pancreatitis</a></p>
		<p><a href="/diagnosis/cirrhosis">Cirrhosis</a></p>
		<p><a href="/diagnosis/clostridium_difficile">Clostridium Difficile</a></p>
		<p><a href="/diagnosis/coeliac_disease">Coeliac Disease</a></p>
		<p><a href="/diagnosis/cold_sore">Cold Sore</a></p>
		<p><a href="/diagnosis/colorectal_cancer">Colorectal Cancer</a></p>
		<p><a href="/diagnosis/common_heart_conditions">Common Heart Conditions</a></p>
		<p><a href="/diagnosis/congenital_heart_disease">Congenital Heart Disease</a></p>
		<p><a href="/diagnosis/conjunctivitis">Conjunctivitis</a></p>
		<p><a href="/diagnosis/constipation">Constipation</a></p>
		<p><a href="/diagnosis/coronavirus_(covid-19)">Coronavirus (COVID-19)</a></p>
		<p><a href="/diagnosis/crohn's_disease">Crohn's Disease</a></p>
		<p><a href="/diagnosis/croup">Croup</a></p>
		<p><a href="/diagnosis/cystic_fibrosis">Cystic Fibrosis</a></p>
		<p><a href="/diagnosis/cystitis">Cystitis</a></p>
		<p><a href="/diagnosis/dementia">Dementia</a></p>
		<p><a href="/diagnosis/dementia_with_lewy_bodies">Dementia With Lewy Bodies</a></p>
		<p><a href="/diagnosis/dental_abscess">Dental Abscess</a></p>
		<p><a href="/diagnosis/depression">Depression</a></p>
		<p><a href="/diagnosis/dermatitis_herpetiformis">Dermatitis Herpetiformis</a></p>
		<p><a href="/diagnosis/diabetes">Diabetes</a></p>
		<p><a href="/diagnosis/discoid_eczema">Discoid Eczema</a></p>
		<p><a href="/diagnosis/diverticular_disease_and_diverticulitis">Diverticular Disease And Diverticulitis</a></p>
		<p><a href="/diagnosis/dysphagia_(swallowing_problems)">Dysphagia (swallowing Problems)</a></p>
		<p><a href="/diagnosis/dystonia">Dystonia</a></p>
		<p><a href="/diagnosis/ebola_virus_disease">Ebola Virus Disease</a></p>
		<p><a href="/diagnosis/endocarditis">Endocarditis</a></p>
		<p><a href="/diagnosis/endometriosis">Endometriosis</a></p>
		<p><a href="/diagnosis/epilepsy">Epilepsy</a></p>
		<p><a href="/diagnosis/ewing_sarcoma">Ewing Sarcoma</a></p>
		<p><a href="/diagnosis/fibroids">Fibroids</a></p>
		<p><a href="/diagnosis/fibromyalgia">Fibromyalgia</a></p>
		<p><a href="/diagnosis/flu">Flu</a></p>
		<p><a href="/diagnosis/food_poisoning">Food Poisoning</a></p>
		<p><a href="/diagnosis/gallbladder_cancer">Gallbladder Cancer</a></p>
		<p><a href="/diagnosis/gallstones">Gallstones</a></p>
		<p><a href="/diagnosis/ganglion_cyst">Ganglion Cyst</a></p>
		<p><a href="/diagnosis/gastro-oesophageal_reflux_disease_(gord)">Gastro-oesophageal Reflux Disease (GORD)</a></p>
		<p><a href="/diagnosis/gastroenteritis">Gastroenteritis</a></p>
		<p><a href="/diagnosis/genital_herpes">Genital Herpes</a></p>
		<p><a href="/diagnosis/genital_warts">Genital Warts</a></p>
		<p><a href="/diagnosis/glandular_fever">Glandular Fever</a></p>
		<p><a href="/diagnosis/gonorrhoea">Gonorrhoea</a></p>
		<p><a href="/diagnosis/gout">Gout</a></p>
		<p><a href="/diagnosis/gum_disease">Gum Disease</a></p>
		<p><a href="/diagnosis/haemorrhoids_(piles)">Haemorrhoids (piles)</a></p>
		<p><a href="/diagnosis/hairy_cell_leukaemia">Hairy Cell Leukaemia</a></p>
		<p><a href="/diagnosis/hand,_foot_and_mouth_disease">Hand, Foot And Mouth Disease</a></p>
		<p><a href="/diagnosis/head_and_neck_cancer">Head And Neck Cancer</a></p>
		<p><a href="/diagnosis/heart_attack">Heart Attack</a></p>
		<p><a href="/diagnosis/heart_failure">Heart Failure</a></p>
		<p><a href="/diagnosis/hepatitis_a">Hepatitis A</a></p>
		<p><a href="/diagnosis/hepatitis_b">Hepatitis B</a></p>
		<p><a href="/diagnosis/hepatitis_c">Hepatitis C</a></p>
		<p><a href="/diagnosis/hiatus_hernia">Hiatus Hernia</a></p>
		<p><a href="/diagnosis/hiv">HIV</a></p>
		<p><a href="/diagnosis/hodgkin_lymphoma">Hodgkin Lymphoma</a></p>
		<p><a href="/diagnosis/huntington's_disease">Huntington's Disease</a></p>
		<p><a href="/diagnosis/hyperglycaemia_(high_blood_sugar)">Hyperglycaemia (high Blood Sugar)</a></p>
		<p><a href="/diagnosis/hypoglycaemia_(low_blood_sugar)">Hypoglycaemia (low Blood Sugar)</a></p>
		<p><a href="/diagnosis/idiopathic_pulmonary_fibrosis">Idiopathic Pulmonary Fibrosis</a></p>
		<p><a href="/diagnosis/impetigo">Impetigo</a></p>
		<p><a href="/diagnosis/indigestion">Indigestion</a></p>
		<p><a href="/diagnosis/iron_deficiency_anaemia">Iron Deficiency Anaemia</a></p>
		<p><a href="/diagnosis/irritable_bowel_syndrome_(ibs)">Irritable Bowel Syndrome (IBS)</a></p>
		<p><a href="/diagnosis/irritable_hip">Irritable Hip</a></p>
		<p><a href="/diagnosis/kaposi's_sarcoma">Kaposi's Sarcoma</a></p>
		<p><a href="/diagnosis/kidney_cancer">Kidney Cancer</a></p>
		<p><a href="/diagnosis/kidney_infection">Kidney Infection</a></p>
		<p><a href="/diagnosis/kidney_stones">Kidney Stones</a></p>
		<p><a href="/diagnosis/labyrinthitis">Labyrinthitis</a></p>
		<p><a href="/diagnosis/lactose_intolerance">Lactose Intolerance</a></p>
		<p><a href="/diagnosis/langerhans_cell_histiocytosis">Langerhans Cell Histiocytosis</a></p>
		<p><a href="/diagnosis/laryngeal_(larynx)_cancer">Laryngeal (larynx) Cancer</a></p>
		<p><a href="/diagnosis/laryngitis">Laryngitis</a></p>
		<p><a href="/diagnosis/lichen_planus">Lichen Planus</a></p>
		<p><a href="/diagnosis/liver_cancer">Liver Cancer</a></p>
		<p><a href="/diagnosis/liver_disease">Liver Disease</a></p>
		<p><a href="/diagnosis/liver_tumours">Liver Tumours</a></p>
		<p><a href="/diagnosis/lung_cancer">Lung Cancer</a></p>
		<p><a href="/diagnosis/lupus">Lupus</a></p>
		<p><a href="/diagnosis/lyme_disease">Lyme Disease</a></p>
		<p><a href="/diagnosis/lymphoedema">Lymphoedema</a></p>
		<p><a href="/diagnosis/lymphogranuloma_venereum_(lgv)">Lymphogranuloma Venereum (LGV)</a></p>
		<p><a href="/diagnosis/malaria">Malaria</a></p>
		<p><a href="/diagnosis/malignant_brain_tumour_(cancerous)">Malignant Brain Tumour (cancerous)</a></p>
		<p><a href="/diagnosis/malnutrition">Malnutrition</a></p>
		<p><a href="/diagnosis/measles">Measles</a></p>
		<p><a href="/diagnosis/melanoma">Melanoma</a></p>
		<p><a href="/diagnosis/meniere's_disease">Meniere's Disease</a></p>
		<p><a href="/diagnosis/meningitis">Meningitis</a></p>
		<p><a href="/diagnosis/encephalitis">Meningitis/encephalitis</a></p>
		<p><a href="/diagnosis/menopause">Menopause</a></p>
		<p><a href="/diagnosis/mesothelioma">Mesothelioma</a></p>
		<p><a href="/diagnosis/middle_ear_infection_(otitis_media)">Middle Ear Infection (otitis Media)</a></p>
		<p><a href="/diagnosis/migraine">Migraine</a></p>
		<p><a href="/diagnosis/monkeypox">Monkeypox</a></p>
		<p><a href="/diagnosis/motor_neurone_disease_(mnd)">Motor Neurone Disease (MND)</a></p>
		<p><a href="/diagnosis/mouth_cancer">Mouth Cancer</a></p>
		<p><a href="/diagnosis/mouth_ulcer">Mouth Ulcer</a></p>
		<p><a href="/diagnosis/multiple_myeloma">Multiple Myeloma</a></p>
		<p><a href="/diagnosis/multiple_sclerosis">Multiple Sclerosis</a></p>
		<p><a href="/diagnosis/multiple_sclerosis_(ms)">Multiple Sclerosis (MS)</a></p>
		<p><a href="/diagnosis/mumps">Mumps</a></p>
		<p><a href="/diagnosis/nasal_and_sinus_cancer">Nasal And Sinus Cancer</a></p>
		<p><a href="/diagnosis/nasopharyngeal_cancer">Nasopharyngeal Cancer</a></p>
		<p><a href="/diagnosis/neuroblastoma">Neuroblastoma</a></p>
		<p><a href="/diagnosis/neuroblastoma:_children">Neuroblastoma: Children</a></p>
		<p><a href="/diagnosis/neuroendocrine_tumours">Neuroendocrine Tumours</a></p>
		<p><a href="/diagnosis/non-alcoholic_fatty_liver_disease_(nafld)">Non-alcoholic Fatty Liver Disease (NAFLD)</a></p>
		<p><a href="/diagnosis/non-hodgkin_lymphoma">Non-Hodgkin Lymphoma</a></p>
		<p><a href="/diagnosis/norovirus">Norovirus</a></p>
		<p><a href="/diagnosis/obsessive_compulsive_disorder_(ocd)">Obsessive Compulsive Disorder (OCD)</a></p>
		<p><a href="/diagnosis/oesophageal_cancer">Oesophageal Cancer</a></p>
		<p><a href="/diagnosis/oral_thrush_in_adults">Oral Thrush In Adults</a></p>
		<p><a href="/diagnosis/osteoarthritis">Osteoarthritis</a></p>
		<p><a href="/diagnosis/osteoporosis">Osteoporosis</a></p>
		<p><a href="/diagnosis/osteosarcoma">Osteosarcoma</a></p>
		<p><a href="/diagnosis/otitis_externa">Otitis Externa</a></p>
		<p><a href="/diagnosis/ovarian_cancer">Ovarian Cancer</a></p>
		<p><a href="/diagnosis/ovarian_cyst">Ovarian Cyst</a></p>
		<p><a href="/diagnosis/overactive_thyroid">Overactive Thyroid</a></p>
		<p><a href="/diagnosis/paget's_disease_of_the_nipple">Paget's Disease Of The Nipple</a></p>
		<p><a href="/diagnosis/pancreatic_cancer">Pancreatic Cancer</a></p>
		<p><a href="/diagnosis/panic_disorder">Panic Disorder</a></p>
		<p><a href="/diagnosis/parkinson's_disease">Parkinson's Disease</a></p>
		<p><a href="/diagnosis/pelvic_inflammatory_disease">Pelvic Inflammatory Disease</a></p>
		<p><a href="/diagnosis/pelvic_organ_prolapse">Pelvic Organ Prolapse</a></p>
		<p><a href="/diagnosis/peripheral_neuropathy">Peripheral Neuropathy</a></p>
		<p><a href="/diagnosis/personality_disorder">Personality Disorder</a></p>
		<p><a href="/diagnosis/pleurisy">Pleurisy</a></p>
		<p><a href="/diagnosis/pneumonia">Pneumonia</a></p>
		<p><a href="/diagnosis/polymyalgia_rheumatica">Polymyalgia Rheumatica</a></p>
		<p><a href="/diagnosis/post-traumatic_stress_disorder_(ptsd)">Post-traumatic Stress Disorder (PTSD)</a></p>
		<p><a href="/diagnosis/pressure_ulcers">Pressure Ulcers</a></p>
		<p><a href="/diagnosis/prostate_cancer">Prostate Cancer</a></p>
		<p><a href="/diagnosis/psoriasis">Psoriasis</a></p>
		<p><a href="/diagnosis/psoriatic_arthritis">Psoriatic Arthritis</a></p>
		<p><a href="/diagnosis/raynaud's_phenomenon">Raynaud's Phenomenon</a></p>
		<p><a href="/diagnosis/reactive_arthritis">Reactive Arthritis</a></p>
		<p><a href="/diagnosis/restless_legs_syndrome">Restless Legs Syndrome</a></p>
		<p><a href="/diagnosis/retinoblastoma">Retinoblastoma</a></p>
		<p><a href="/diagnosis/rhabdomyosarcoma">Rhabdomyosarcoma</a></p>
		<p><a href="/diagnosis/rheumatoid_arthritis">Rheumatoid Arthritis</a></p>
		<p><a href="/diagnosis/ringworm_and_other_fungal_infections">Ringworm And Other Fungal Infections</a></p>
		<p><a href="/diagnosis/rosacea">Rosacea</a></p>
		<p><a href="/diagnosis/scabies">Scabies</a></p>
		<p><a href="/diagnosis/scarlet_fever">Scarlet Fever</a></p>
		<p><a href="/diagnosis/schizophrenia">Schizophrenia</a></p>
		<p><a href="/diagnosis/sepsis">Sepsis</a></p>
		<p><a href="/diagnosis/septic_shock">Septic Shock</a></p>
		<p><a href="/diagnosis/shingles">Shingles</a></p>
		<p><a href="/diagnosis/sickle_cell_disease">Sickle Cell Disease</a></p>
		<p><a href="/diagnosis/sinusitis">Sinusitis</a></p>
		<p><a href="/diagnosis/sjogren's_syndrome">Sjogren's Syndrome</a></p>
		<p><a href="/diagnosis/skin_cancer_(melanoma)">Skin Cancer (melanoma)</a></p>
		<p><a href="/diagnosis/skin_cancer_(non-melanoma)">Skin Cancer (non-melanoma)</a></p>
		<p><a href="/diagnosis/slapped_cheek_syndrome">Slapped Cheek Syndrome</a></p>
		<p><a href="/diagnosis/soft_tissue_sarcoma">Soft Tissue Sarcoma</a></p>
		<p><a href="/diagnosis/soft_tissue_sarcomas">Soft Tissue Sarcomas</a></p>
		<p><a href="/diagnosis/spinal_abscess">Spinal Abscess</a></p>
		<p><a href="/diagnosis/spleen_problems_and_spleen_removal">Spleen Problems And Spleen Removal</a></p>
		<p><a href="/diagnosis/stomach_cancer">Stomach Cancer</a></p>
		<p><a href="/diagnosis/stomach_ulcer">Stomach Ulcer</a></p>
		<p><a href="/diagnosis/stroke">Stroke</a></p>
		<p><a href="/diagnosis/swollen_glands">Swollen Glands</a></p>
		<p><a href="/diagnosis/syphilis">Syphilis</a></p>
		<p><a href="/diagnosis/testicular_cancer">Testicular Cancer</a></p>
		<p><a href="/diagnosis/threadworms">Threadworms</a></p>
		<p><a href="/diagnosis/thrush">Thrush</a></p>
		<p><a href="/diagnosis/thrush_in_men">Thrush In Men</a></p>
		<p><a href="/diagnosis/thyroid_cancer">Thyroid Cancer</a></p>
		<p><a href="/diagnosis/tonsillitis">Tonsillitis</a></p>
		<p><a href="/diagnosis/toothache">Toothache</a></p>
		<p><a href="/diagnosis/transient_ischaemic_attack_(tia)">Transient Ischaemic Attack (TIA)</a></p>
		<p><a href="/diagnosis/trichomonas_infection">Trichomonas Infection</a></p>
		<p><a href="/diagnosis/trigeminal_neuralgia">Trigeminal Neuralgia</a></p>
		<p><a href="/diagnosis/tuberculosis_(tb)">Tuberculosis (TB)</a></p>
		<p><a href="/diagnosis/type_1_diabetes">Type 1 Diabetes</a></p>
		<p><a href="/diagnosis/type_2_diabetes">Type 2 Diabetes</a></p>
		<p><a href="/diagnosis/ulcerative_colitis">Ulcerative Colitis</a></p>
		<p><a href="/diagnosis/underactive_thyroid">Underactive Thyroid</a></p>
		<p><a href="/diagnosis/urinary_tract_infection_(uti)">Urinary Tract Infection (UTI)</a></p>
		<p><a href="/diagnosis/urticaria_(hives)">Urticaria (hives)</a></p>
		<p><a href="/diagnosis/vaginal_cancer">Vaginal Cancer</a></p>
		<p><a href="/diagnosis/vaginal_thrush">Vaginal Thrush</a></p>
		<p><a href="/diagnosis/varicose_eczema">Varicose Eczema</a></p>
		<p><a href="/diagnosis/venous_leg_ulcer">Venous Leg Ulcer</a></p>
		<p><a href="/diagnosis/venous_thromboembolism">Venous Thromboembolism</a></p>
		<p><a href="/diagnosis/vulval_cancer">Vulval Cancer</a></p>
		<p><a href="/diagnosis/whooping_cough">Whooping Cough</a></p>
		<p><a href="/diagnosis/wilms_tumour">Wilms Tumour</a></p>
		<p><a href="/diagnosis/womb_(uterus)_cancer">Womb (uterus) Cancer</a></p>
		<p><a href="/diagnosis/yellow_fever">Yellow Fever</a></p>
		
		
	</div>
		
		
			

	</div>

	
	
	
	


	<div class="col-md-4">


		<?php
			$blog = $posts;
			$blogs_chunk = array_chunk($blog, 2);
			$badge_class = ["badge-primary", "badge-secondary", "badge-success", "badge-danger", "badge-warning", "badge-info", "badge-dark"];
			?>
			<?php if ($blog === null) : ?>
			
 			<h2>No posts are present </h2>
			</div>
			<?php else : ?>
			
			
			<?php foreach ($blogs_chunk as $key => $items) : ?>
		
		
	 			
   					<?php foreach ($items as $key => $value) : ?>
						
	  					<div class="card mb-3">
	    					<div class="row no-gutters rounded overflow-hidden flex-md-row" style="background-image: url(<?php if ($value['post_thumb']) { echo '/mymisdiagnosis' . $value['post_thumb']; } ?>); background-size: 440px; background-repeat: no-repeat;">
		  					<div class="card-body listpage">
		  					
		    					<h4 class="home card-title mb-0"><a href="pages/<?= $value['slug'] ?>"><?= $value['post_title'] ?></a></h4>
	    					
		  					</div>
							</div>
							
							
	  					</div><!-- end mb3 -->
		  					
		  					
						
   					<?php endforeach; ?>
		

			<?php endforeach; ?>
			
			
			<?php endif; ?>
  
		 
	</div>
	
	  
		 
	</div>  <!-- end of post_body -->
    
