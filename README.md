# Monitoramento de Disponibilidade - Badminton Itape

Este repositório contém um script de automação desenvolvido para monitorar a disponibilidade do site **Badminton Itape**. A ferramenta envia alertas automáticos caso o site fique offline, garantindo uma resposta rápida a períodos de indisponibilidade, como manutenções programadas ou falhas no servidor.

## Sobre a Implementação

* **Código de Teste:** O script presente neste repositório é uma versão de teste utilizada para validação da lógica de monitoramento.
* **Ambiente de Produção:** O sistema que está atualmente em execução e monitorando o site oficial foi desenvolvido em **PHP**, garantindo performance e integração direta com o ambiente de hospedagem.

## Funcionalidades

* **Verificação Periódica:** Monitoramento automático de status HTTP (uptime/downtime).
* **Alertas em Tempo Real:** Notificações instantâneas caso o serviço fique indisponível. Nesse caso, o script foi feito para enviar uma mensagem via bot criado no Telegram.
* **Leveza:** Script otimizado para fácil integração em servidores de produção.

## Aplicação DevOps

Este projeto exemplifica práticas fundamentais de **DevOps**:

* **Observabilidade:** Monitoramento proativo para reduzir o Tempo Médio de Detecção (MTTD).
* **Automação:** Eliminação de verificações manuais repetitivas.
* **Confiabilidade:** Garantia da resiliência do serviço através de feedback contínuo.

## Como Utilizar (Script de Teste)

1. Clone este repositório:
   ```bash
   git clone [https://github.com/seu-usuario/seu-repositorio.git](https://github.com/seu-usuario/seu-repositorio.git)
