package tn.esprit.spring.service;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import lombok.extern.slf4j.Slf4j;
import tn.esprit.spring.repositories.BoutiqueRepository;
import tn.esprit.spring.repositories.CentreComRepository;
import tn.esprit.spring.repositories.ClientRepository;

@Service
@Slf4j
public class BoutiqueServiceImpl implements IBoutiqueService {
	@Autowired
	CentreComRepository centreRepository; 
	@Autowired
	ClientRepository clientRepository;
	@Autowired
	BoutiqueRepository boutiqueRepository; 
}
