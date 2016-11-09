<?php

interface IRepository
{
    CONST SEARCH_BY_WORD = "SELECT Hospedaje.id_hospedaje,
                                    Hospedaje.nombre,
                                    Hospedaje.ciudad,
                                    Hospedaje.provincia,
                                    Hotel.num_estrellas,
                                    Hotel.tipo_habitacion,
                                    Apartamento.capacidad,
                                    Apartamento.num_apartamentos
    FROM Hospedaje LEFT JOIN Hotel ON (Hospedaje.id_hospedaje = Hotel.id_hospedaje)
    LEFT JOIN Apartamento ON(Hospedaje.id_hospedaje = Apartamento.id_hospedaje)
    WHERE Hospedaje.nombre LIKE \"%?%\"
      OR Hospedaje.ciudad LIKE \"%?%\"
      OR Hospedaje.provincia LIKE \"%?%\"
      OR Hotel.num_estrellas LIKE \"%?%\"
      OR Hotel.tipo_habitacion LIKE \"%?%\"
      OR Apartamento.capacidad LIKE \"%?%\"
      OR Apartamento.num_apartamentos LIKE \"%?%\" COLLATE utf8_bin";
}