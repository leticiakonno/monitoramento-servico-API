import requests

def enviar_alerta(mensagem):
    token = "<SEU-TOKEN-AQUI>"  # Cole seu token aqui
    chat_id = "<SUA-ID-AQUI>" # Cole seu ID aqui
    url = f"https://api.telegram.org/bot{token}/sendMessage"
    
    params = {
        "chat_id": chat_id,
        "text": mensagem
    }
    
    response = requests.get(url, params=params)
    return response.json()

# Testando o envio
if __name__ == "__main__":
    msg = "Alerta: O sistema está funcionando perfeitamente!"
    resultado = enviar_alerta(msg)
    
    if resultado.get("ok"):
        print("Mensagem enviada com sucesso!")
    else:
        print("Erro ao enviar a mensagem:", resultado)
