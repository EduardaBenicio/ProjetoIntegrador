package br.com.aula.CRUDCliente.model;

import lombok.AllArgsConstructor;
import lombok.Builder;
import lombok.Getter;
import lombok.NoArgsConstructor;
import lombok.NonNull;
import lombok.RequiredArgsConstructor;
import lombok.Setter;

@Getter
@Setter
@NoArgsConstructor
@AllArgsConstructor
//@RequiredArgsConstructor
@Builder
public class Usuario {
    @NonNull
    public String user;
    @NonNull
    public String password;
}
