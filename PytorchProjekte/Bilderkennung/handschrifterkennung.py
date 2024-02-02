import torch
import torch.nn as nn
import torch.nn. functional as F
import torch.optim as optim
from torch.autograd import Variable
from torchvision import datasets, transforms

kwargs = {'num_workers': 1, 'pin_memory': True}

train_data = torch.utils.data.DataLoader(datasets.MNIST('data', train=True, download=True,
                                                     transform=transforms.Compose([transforms.ToTensor(), 
                                                     transforms.Normalize((0.1307,) , (0.3081,))])), batch_size=64, shuffle=True, **kwargs)

test_data = torch.utils.data.DataLoader(datasets.MNIST('data', train=False,
                                                     transform=transforms.Compose([transforms.ToTensor(), 
                                                     transforms.Normalize((0.1307,) , (0.3081,))])), batch_size=64, shuffle=True, **kwargs)

class Netz(nn.Module):
    def __init__(self):
        super(Netz, self).__init__()
        self.conv1 = nn.Conv2d(1,10, kernel_size=5)
        self.conv2 = nn.Conv2d(10,20, kernel_size=5)
        self.conv_dropout = nn.Dropout2d()
        self.fc1 = nn.Linear(320, 60)
        self.fc2 = nn.Linear(60, 10)

    def forward(self, x):
        print(x.shape)
        exit()
        x = self.conv1(x)
        x = F.max_pool2d(x, 2)
        x = F.relu(x)
        x = self.conv2(x)
        x = self.conv_dropout(x)

        x = F.max_pool2d(x, 2)
        x = F.relu(x)
        #print(x.size())
        #x = torch.flatten(x, start_dim=2)
        #print(x.shape)
        #exit() 
        x = x.view(-1, 320)
        x = F.relu(self.fc1(x))
        x = self.fc2(x)
        return F.log_softmax(x, dim=0)


model = Netz()
model.cuda()


optimizer = optim.SGD(model.parameters(), lr = 0.01, momentum = 0.8)
def train(epoch):
    model.train()   
    for batch_id, (data, target) in enumerate(train_data):
        #print('Schau mal ID: ', batch_id,'Data: ', data,'Ziel: ', target,)
        data = data.cuda()
        target = target.cuda()
        data = Variable(data) # Diese Zeilen mit Variable() können quasi gelöscht werden, da der Gradient automatisch tracked wird.
        target = Variable(target)
        optimizer.zero_grad()
        out = model(data)
        loss = F.nll_loss(out, target)
        loss.backward()
        optimizer.step()
        print(f'Train Epoch: {epoch} [{batch_id * len(data)}/{len(train_data.dataset)} ({100. * batch_id / len(train_data):.0f}%)]\tLoss: {loss.item():.6f}')
 

def test():
    model.eval()
    loss = 0
    correct = 0
    for data, target in test_data:
        with torch.no_grad():
            data = Variable(data.cuda())
        target = Variable(target.cuda())
        out = model(data)
        loss += F.nll_loss(out, target, reduction='sum').item()
        prediction = out.data.max(1, keepdim=True)[1]
        correct += prediction.eq(target.data.view_as(prediction)).cpu().sum()
    loss = loss / len(test_data.dataset)
    print('Durchschnittsloss: ', loss)
    print('Genauigkeit: ', 100.*correct/len(test_data.dataset))
    #print('Genauigkeit: ', correct,' datensatz: ',test_data.dataset)

if __name__ == '__main__':
    for epoch in range(1, 3):
        train(epoch)
        test()
