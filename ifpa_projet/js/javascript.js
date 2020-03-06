$( document ).ready(function() {
    $('small').hide();
	$('#inscription').on("keyup change submit",function(e) {
		if($('#inscription input[name=nom_inscription]').val()=='')
		{
			e.preventDefault();
			$('#nom_inscription_alert').show();
		}
		else
		{
			$('#nom_inscription_alert').hide();

		}
		if($('#inscription input[name=prenom_inscription]').val()=='')
		{
			e.preventDefault();
			$('#prenom_inscription_alert').show();
		}
		else
		{
			$('#prenom_inscription_alert').hide();

		}
		if($('#inscription input[name=mdp_inscription]').val()=='')
		{
			e.preventDefault();
			$('#mdp_inscription_alert').show();
		}
		else
		{
			$('#mdp_inscription_alert').hide();
		}
		if($('#inscription input[name=mdp_verif]').val()=='')
		{
			e.preventDefault();
			$('#mdp_inscription_verif_alert').show();
			$('#mdp_verif_alert').hide();
		}
		else
		{	
			$('#mdp_inscription_verif_alert').hide();

			if(($('#inscription input[name=mdp_inscription]').val())!=($('#inscription input[name=mdp_verif]').val()))
			{
				e.preventDefault();
				$('#mdp_verif_alert').show();
			}
			else
			{
				$('#mdp_verif_alert').hide();
			}
		}
	});
	$('#connexion').on("keyup change submit",function(e) {

		if($('#connexion input[name=mail_connexion]').val()=='')
		{
			e.preventDefault();
			$('#email_connexion_alert').show();
		}
		else
		{
			$('#email_connexion_alert').hide();
		}
		if($('#connexion input[name=mdp_connexion]').val()=='')
		{
			e.preventDefault();
			$('#mdp_connexion_alert').show();
		}
		else
		{
			$('#mdp_connexion_alert').hide();
		}
	});
});