package tn.esprit.spring.service;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import lombok.extern.slf4j.Slf4j;
import tn.esprit.spring.entities.Boutique;
import tn.esprit.spring.entities.Cathegorie;
import tn.esprit.spring.entities.CentreCommercial;
import tn.esprit.spring.entities.Client;
import tn.esprit.spring.repositories.BoutiqueRepository;
import tn.esprit.spring.repositories.CentreComRepository;
import tn.esprit.spring.repositories.ClientRepository;


@Service
@Slf4j

public class CentreComServiceImpl implements ICentreComService {

	@Autowired
	CentreComRepository centreRepository; 
	@Autowired
	ClientRepository clientRepository;
	@Autowired
	BoutiqueRepository boutiqueRepository;
	@Override
	public void ajoutCentre(CentreCommercial centre) {
		centreRepository.save(centre); 
		
	}
	@Override
	public void ajouterEtaffecterListeboutiques(List<Boutique> lb, Long idCentre) {
		CentreCommercial centre = centreRepository.findById(idCentre).orElse(null);
		for (Boutique boutique : lb) {
			boutique.setCentre(centre);
			boutiqueRepository.save(boutique);	
		}
	}
	@Override
	public void ajouterEtAffecterClientBoutiques(Client client, List<Long> idBoutiques) {
		clientRepository.save(client);
		for (Long idBoutique : idBoutiques) {
			Boutique boutique = boutiqueRepository.findById(idBoutique).orElse(null);
			boutique.getClients().add(client);
		}		
	}
	@Override
	public void ajouterEtAffecterClientBoutiques(Client client) {
		// TODO Auto-generated method stub
		
	}
	@Override
	public List<Client> listeClients(Long idBoutique) {
		Boutique boutique = boutiqueRepository.findById(idBoutique).orElse(null);
		return boutique.getClients();
	}
	@Override
	public List<Boutique> listeBoutique(Long idCentre) {
		// TODO Auto-generated method stub
		return null;
	}
	@Override
	public List<Client> listeDeClientsParCategorie(Cathegorie cathegorie) {
		// TODO Auto-generated method stub
		return null;
	}
	@Override
	public void nbreClientParGenre() {
		// TODO Auto-generated method stub
		
	} 
}
