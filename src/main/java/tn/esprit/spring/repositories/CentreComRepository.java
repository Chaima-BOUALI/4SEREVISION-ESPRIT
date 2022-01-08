package tn.esprit.spring.repositories;

import org.springframework.data.repository.CrudRepository;
import org.springframework.stereotype.Repository;

import tn.esprit.spring.entities.CentreCommercial;
@Repository
public interface CentreComRepository extends CrudRepository<CentreCommercial, Long> {

}
