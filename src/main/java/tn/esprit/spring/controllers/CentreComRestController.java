package tn.esprit.spring.controllers;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import io.swagger.annotations.Api;
import springfox.documentation.swagger2.annotations.EnableSwagger2;
import tn.esprit.spring.entities.Boutique;
import tn.esprit.spring.entities.Cathegorie;
import tn.esprit.spring.entities.CentreCommercial;
import tn.esprit.spring.entities.Client;
import tn.esprit.spring.service.ICentreComService;

@EnableSwagger2
@Api(tags = "Gestion du Centre Commercial")
@RestController
@RequestMapping("/centre")
public class CentreComRestController {
	@Autowired
	ICentreComService servicecentre; 
	@PostMapping("/add")
	public void addCentre(@RequestBody CentreCommercial centre){
		servicecentre.ajoutCentre(centre);
	}
	@PostMapping("/add-boutiques/{id-centre}")
	public void ajouterEtaffecterListeboutiques(@RequestBody List<Boutique> lb, @PathVariable("id-centre") Long idCentre){
		servicecentre.ajouterEtaffecterListeboutiques(lb, idCentre);
	}
	@PostMapping("/add-clientB")//methode 2
	public void affecterClientBoutiques(@RequestBody Client client){
		servicecentre.ajouterEtAffecterClientBoutiques(client);
	}
	@GetMapping("/clients/{id-boutique}")
	public List<Client> listeClients(@PathVariable("id-boutique")Long idBoutique) {
		return servicecentre.listeClients(idBoutique);
	}
	@GetMapping("/boutiques/{id-centre}")
	public List<Boutique> listeBoutique(@PathVariable("id-centre")Long idCentre) {
		return servicecentre.listeBoutique(idCentre);
	}
	@GetMapping("/clients-category/{category}")
	public List<Client> listeDeClientsParCategorie(@PathVariable("category") Cathegorie cathegorie) {
		return servicecentre.listeDeClientsParCategorie(cathegorie);
	}
}
